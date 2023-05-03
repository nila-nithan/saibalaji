<?php

class Home
{

    private $conn;
    private $table_name = "banner";
    public $banner;

    private $table_name2 = "category";
    public $categoryName;
    public $image;

    private $table_name3 = "products";
    public $productName;
    public $salesPrice;

    public function __construct($db)
    {
        $this->conn = $db;
    }

  
    // GET ALL BANNER
    public function banner()
    {
        $sqlQuery = "SELECT `banner` FROM " . $this->table_name . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
    }

    // GET ALL BANNER
    public function category()
    {
        $sqlQuery = "SELECT id,categoryName , image FROM " . $this->table_name2 . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
    }

    // GET ALL BANNER
    public function products()
    {
        $sqlQuery = "SELECT id,productName,salesPrice,image FROM " . $this->table_name3 . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
    }
 

  }
