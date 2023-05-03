<?php

class Payment
{

    private $conn;
    private $table_name = "payment";

    public $payment_id;
    public $order_id;
    public $customer_id;
    public $payment_status;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    // GET ALL
    public function getAll()
    {
        $sqlQuery = "SELECT * FROM " . $this->table_name . " JOIN products ON " . $this->table_name . ".product_id = products.id WHERE " . $this->table_name . ".customerID = ?";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->customerID);
        $stmt->execute();
        return $stmt;
    }
    //creat
    public function create()
    {
        $paymentQuery = "INSERT INTO " . $this->table_name . " (`payment_id`, `order_id`, `customer_id`, `payment_status`, `grand_total`) 
                 VALUES (:payment_id, :order_id, :customer_id, :payment_status, :grand_total)";
        $paymentStmt = $this->conn->prepare($paymentQuery);

        // sanitize payment data
        $this->payment_id = htmlspecialchars(strip_tags($this->payment_id));
        $this->order_id = htmlspecialchars(strip_tags($this->order_id));
        $this->customer_id = htmlspecialchars(strip_tags($this->customer_id));
        $this->payment_status = htmlspecialchars(strip_tags($this->payment_status));
        $this->grand_total = htmlspecialchars(strip_tags($this->grand_total));

        // bind payment data
        $paymentStmt->bindParam(":payment_id", $this->payment_id);
        $paymentStmt->bindParam(":order_id", $this->order_id);
        $paymentStmt->bindParam(":customer_id", $this->customer_id);
        $paymentStmt->bindParam(":payment_status", $this->payment_status);
        $paymentStmt->bindParam(":grand_total", $this->grand_total);

        $sqlQuery = "SELECT * FROM `cart` WHERE customerID = ? ";
        $cartstmt = $this->conn->prepare($sqlQuery);
        $cartstmt->bindParam(1, $this->customer_id);
        $cartstmt->execute();
        while ($row = $cartstmt->fetch()) {
            $product_id = $row['product_id'];
            $price = $row['price'];
            $quantity = $row['quantity'];
            $total = $row['total'];

            $orderQuery = "INSERT INTO `orders` (`order_id`,`customer_id`, `product_id`,`productName`,`price`, `quantity`, `total`, `payment_id`, `payment_status`, `delivery_status`) VALUES (:order_id, :customer_id, :product_id, :productName, :price, :quantity, :total, :payment_id, :payment_status, :delivery_status)";
            $orderStmt = $this->conn->prepare($orderQuery);

            // sanitize order data
            $this->order_id = htmlspecialchars(strip_tags($this->order_id));
            $price = htmlspecialchars(strip_tags($price));
            $total = htmlspecialchars(strip_tags($total));
            $product_id = htmlspecialchars(strip_tags($product_id)); // use the value of $product_id instead of $this->product_id
            $this->customer_id = htmlspecialchars(strip_tags($this->customer_id));
            $this->payment_id = htmlspecialchars(strip_tags($this->payment_id));
            $this->payment_status = htmlspecialchars(strip_tags($this->payment_status));
            $this->delivery_status = htmlspecialchars(strip_tags($this->delivery_status));

            // bind order data
            $orderStmt->bindParam(":order_id", $this->order_id);
            $orderStmt->bindParam(":product_id", $product_id);
            $orderStmt->bindParam(":customer_id", $this->customer_id);
            $orderStmt->bindParam(":productName", $row['productName']); // bind the product name from the cart row
            $orderStmt->bindParam(":price", $price);
            $orderStmt->bindParam(":quantity", $quantity);
            $orderStmt->bindParam(":total", $total);
            $orderStmt->bindParam(":payment_id", $this->payment_id);
            $orderStmt->bindParam(":payment_status", $this->payment_status);
            $orderStmt->bindParam(":delivery_status", $this->delivery_status);

            // execute the order query
            $orderStmt->execute();

            if ($orderStmt->rowCount() > 0) {
                $delete_sql = "DELETE FROM `cart` WHERE `customerID` = :customer_id"; // use $this->customer_id instead of $customerID
                $delete_query = $this->conn->prepare($delete_sql);
                $delete_query->bindParam(':customer_id', $this->customer_id); // use $this->customer_id instead of $customerID
                $delete_query->execute();               
            }
            if ($orderStmt->rowCount() > 0) {
                $sqlQuery = "SELECT * FROM `orders` WHERE `order_id`= ?";
                $stmt = $this->conn->prepare($sqlQuery);
                $stmt->bindParam(1, $this->order_id);
                $stmt->execute();
                while ($row = $stmt->fetch()) {
                    $product_id = $row['product_id'];
                    $quantity = $row['quantity'];

                    $sqlupdate = "UPDATE `products` SET `stock_qty` = `stock_qty` - '$quantity' WHERE `id` = '$product_id' ";
                    $stmtupdate = $this->conn->prepare($sqlupdate);
                    $stmtupdate->execute();
                }
                
                
            }
        }
        // execute the payment query
        $paymentStmt->execute();

        if ($paymentStmt->rowCount() > 0) {
            return true;
        }
        return false;
    }

}
