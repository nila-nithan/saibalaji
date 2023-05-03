<?php

class Cart
{

    private $conn;
    private $table_name = "cart";

    public $cart_id;
    public $product_id;
    public $quantity;
    public $customerID;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // GET checkout
    public function checkout()
    {
        $sqlQuery = "SELECT * FROM " . $this->table_name. " JOIN products ON " . $this->table_name . ".product_id = products.id WHERE " . $this->table_name . ".customerID = ?";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->customerID);
        $stmt->execute();
        return $stmt;
    }
    // GET address
    public function address()
    {
        $sqlQuery = "SELECT * FROM customeraddress WHERE customerID = ?";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->customerID);
        $stmt->execute();
        return $stmt;
    }
  
    // GET ALL
    public function getAll()
    {
        $sqlQuery = "SELECT * FROM " . $this->table_name. " JOIN products ON " . $this->table_name . ".product_id = products.id WHERE " . $this->table_name . ".customerID = ?";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->customerID);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function create()
    {             
        $sqlQuery = "INSERT INTO " . $this->table_name . " (`product_id`,`productName`, `customerID`, `quantity`, `price`, `total`) 
                     VALUES (:product_id, :productName, :customerID, :quantity, :price, :total)";
        $stmt = $this->conn->prepare($sqlQuery);
    
        // sanitize
        $this->product_id = htmlspecialchars(strip_tags($this->product_id));
        $this->productName = htmlspecialchars(strip_tags($this->productName));
        $this->customerID = htmlspecialchars(strip_tags($this->customerID));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->total = htmlspecialchars(strip_tags($this->total));
    
        // bind data
        $stmt->bindParam(":product_id", $this->product_id);
        $stmt->bindParam(":productName", $this->productName);
        $stmt->bindParam(":customerID", $this->customerID);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":total", $this->total);
    
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    //CART UPDATE
    public function updateCart()
{
    $sqlQuery = "UPDATE " . $this->table_name . " SET `quantity` = :quantity, `total` = :total WHERE `customerID` = :customerID AND `product_id` = :product_id";
    $stmt = $this->conn->prepare($sqlQuery);

    // sanitize
    $this->customerID = htmlspecialchars(strip_tags($this->customerID));
    $this->product_id = htmlspecialchars(strip_tags($this->product_id));
    $this->quantity = htmlspecialchars(strip_tags($this->quantity));
    $this->total = htmlspecialchars(strip_tags($this->total));

    // bind data
    $stmt->bindParam(":customerID", $this->customerID);
    $stmt->bindParam(":product_id", $this->product_id);
    $stmt->bindParam(":quantity", $this->quantity);
    $stmt->bindParam(":total", $this->total);

    if ($stmt->execute()) {
        return true;
    }
    return false;
}

    // READ single
    public function getById()
    {
        $sqlQuery = "SELECT product_id, quantity FROM " . $this->table_name . " WHERE customerID = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->customerID);
        $stmt->execute();
        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->product_id = $dataRow['product_id'];
        $this->quantity = $dataRow['quantity'];
    }

    // DELETE
    public function delete()
    {
        $sqlQuery = "DELETE FROM " . $this->table_name . " WHERE product_id = ? AND customerID = ? ";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->product_id = htmlspecialchars(strip_tags($this->product_id));
        $this->customerID = htmlspecialchars(strip_tags($this->customerID));

        $stmt->bindParam(1, $this->product_id);
        $stmt->bindParam(2, $this->customerID);

        if ($stmt->execute()) {
            return true;
        }
    }
}

?>