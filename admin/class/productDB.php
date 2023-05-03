<?php

class Product
{

    private $conn;
    private $table_name = "products";

    public $id;
    public $productName;
    public $salesPrice;
    public $actualPrice;
    public $categoryName;
    public $stock_qty;
    public $description;
    public $image;
    public $image2;
    public $image3;
    public $image4;
    public $image5;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // GET ALL
    public function getAll()
    {
        $sqlQuery = "SELECT id, categoryName, image FROM " . $this->table_name;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
    //GET SINGLE PRODUCT
    public function getSingleProduct(){
        $sqlQuery = "SELECT * FROM ". $this->table_name ." WHERE  id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->productName = $dataRow['productName'];
        $this->salesPrice = $dataRow['salesPrice'];
        $this->actualPrice = $dataRow['actualPrice'];
        $this->categoryName = $dataRow['categoryName'];
        $this->image = $dataRow['image'];
        $this->image2 = $dataRow['image2'];
        $this->image3 = $dataRow['image3'];
        $this->image4 = $dataRow['image4'];
        $this->image5 = $dataRow['image5'];
        $this->description = $dataRow['description'];
        
    } 

    // CREATE
    public function create()
    {
        $sqlQuery = "INSERT INTO " . $this->table_name . " (`productName`, `salesPrice`, `actualPrice`, `categoryName`, `stock_qty`, `image`, `image2`, `image3`, `image4`, `image5`,`description`) 
                     VALUES (:productName, :salesPrice, :actualPrice, :categoryName, :quantity, :image, :image2, :image3,:image4, :image5, :description )";
        $stmt = $this->conn->prepare($sqlQuery);
    
        // sanitize
        $this->productName = htmlspecialchars(strip_tags($this->productName));
        $this->salesPrice = htmlspecialchars(strip_tags($this->salesPrice));
        $this->actualPrice = htmlspecialchars(strip_tags($this->actualPrice));
        $this->categoryName = htmlspecialchars(strip_tags($this->categoryName));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->image2 = htmlspecialchars(strip_tags($this->image2));
        $this->image3 = htmlspecialchars(strip_tags($this->image3));
        $this->image4 = htmlspecialchars(strip_tags($this->image4));
        $this->image5 = htmlspecialchars(strip_tags($this->image5));
        $this->description = htmlspecialchars(strip_tags($this->description));
    
        // bind data
        $stmt->bindParam(":productName", $this->productName);
        $stmt->bindParam(":salesPrice", $this->salesPrice);
        $stmt->bindParam(":actualPrice", $this->actualPrice);
        $stmt->bindParam(":categoryName", $this->categoryName);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":image2", $this->image2);
        $stmt->bindParam(":image3", $this->image3);
        $stmt->bindParam(":image4", $this->image4);
        $stmt->bindParam(":image5", $this->image5);
        $stmt->bindParam(":description", $this->description);
    
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    
    // READ single
    public function getById()
    {
        $sqlQuery = "SELECT id, categoryName, image, updateDate FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->categoryName = $dataRow['categoryName'];
        $this->image = $dataRow['image'];
        // $this->updateDate = $dataRow['updateDate'];
    }

    // UPDATE
    public function update()
    {
        $sqlQuery = "UPDATE " . $this->table_name . " SET `productName`=:productName, `salesPrice`=:salesPrice, `actualPrice`=:actualPrice, `categoryName`=:categoryName, `stock_qty`=:quantity,`updateDate`=:updateDate, `image`=:image, `image2`=:image2, `image3`=:image3, `image4`=:image4, `image5`=:image5, `description`=:description WHERE `id`=:id";
        $stmt = $this->conn->prepare($sqlQuery);
        
    
        // sanitize
        $this->productName = htmlspecialchars(strip_tags($this->productName));
        $this->salesPrice = htmlspecialchars(strip_tags($this->salesPrice));
        $this->actualPrice = htmlspecialchars(strip_tags($this->actualPrice));
        $this->categoryName = htmlspecialchars(strip_tags($this->categoryName));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->updateDate = htmlspecialchars(strip_tags($this->updateDate));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->image2 = htmlspecialchars(strip_tags($this->image2));
        $this->image3 = htmlspecialchars(strip_tags($this->image3));
        $this->image4 = htmlspecialchars(strip_tags($this->image4));
        $this->image5 = htmlspecialchars(strip_tags($this->image5));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->id = htmlspecialchars(strip_tags($this->id));
    
        // bind data
        $stmt->bindParam(":productName", $this->productName);
        $stmt->bindParam(":salesPrice", $this->salesPrice);
        $stmt->bindParam(":actualPrice", $this->actualPrice);
        $stmt->bindParam(":categoryName", $this->categoryName);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":updateDate", $this->updateDate);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":image2", $this->image2);
        $stmt->bindParam(":image3", $this->image3);
        $stmt->bindParam(":image4", $this->image4);
        $stmt->bindParam(":image5", $this->image5);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":id", $this->id);
    
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // DELETE
    public function delete()
    {
        $sqlQuery = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }
    }
}

?>