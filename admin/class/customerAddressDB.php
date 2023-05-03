<?php

class Customeraddress
{
    private $conn;
    private $table_name = "customeraddress";

    public $id;
    public $customerID;
    public $doorNo;
    public $area;
    public $landmark;
    public $town;
    public $state;
    public $pincode;
    public $phone;

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

    // CREATE
    public function create()
    {
        $sqlQuery = "INSERT INTO " . $this->table_name . " (`customerID`, `doorNo`, `area`, `landmark`, `town`, `state`, `pincode`, `phone`) VALUES (:customerID, :doorNo, :area, :landmark, :town, :state, :pincode, :phone)";
        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->customerID = htmlspecialchars(strip_tags($this->customerID));
        $this->doorNo = htmlspecialchars(strip_tags($this->doorNo));
        $this->area = htmlspecialchars(strip_tags($this->area));
        $this->landmark = htmlspecialchars(strip_tags($this->landmark));
        $this->town = htmlspecialchars(strip_tags($this->town));
        $this->state = htmlspecialchars(strip_tags($this->state));
        $this->pincode = htmlspecialchars(strip_tags($this->pincode));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
      
        // bind data
        $stmt->bindParam(":customerID", $this->customerID);
        $stmt->bindParam(":doorNo", $this->doorNo);
        $stmt->bindParam(":area", $this->area);
        $stmt->bindParam(":landmark", $this->landmark);
        $stmt->bindParam(":town", $this->town);
        $stmt->bindParam(":state", $this->state);
        $stmt->bindParam(":pincode", $this->pincode);
        $stmt->bindParam(":phone", $this->phone);
 

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
        $this->updateDate = $dataRow['updateDate'];
    }
    // UPDATE
    public function update()
    {
        $sqlQuery = "UPDATE " . $this->table_name . " SET doorNo = :doorNo, area = :area, landmark = :landmark, town = :town, state = :state, pincode = :pincode, phone = :phone WHERE customerID = :customerID";
        $stmt = $this->conn->prepare($sqlQuery);

     // sanitize
     $this->customerID = htmlspecialchars(strip_tags($this->customerID));
     $this->doorNo = htmlspecialchars(strip_tags($this->doorNo));
     $this->area = htmlspecialchars(strip_tags($this->area));
     $this->landmark = htmlspecialchars(strip_tags($this->landmark));
     $this->town = htmlspecialchars(strip_tags($this->town));
     $this->state = htmlspecialchars(strip_tags($this->state));
     $this->pincode = htmlspecialchars(strip_tags($this->pincode));
     $this->phone = htmlspecialchars(strip_tags($this->phone));
   
     // bind data
     $stmt->bindParam(":customerID", $this->customerID);
     $stmt->bindParam(":doorNo", $this->doorNo);
     $stmt->bindParam(":area", $this->area);
     $stmt->bindParam(":landmark", $this->landmark);
     $stmt->bindParam(":town", $this->town);
     $stmt->bindParam(":state", $this->state);
     $stmt->bindParam(":pincode", $this->pincode);
     $stmt->bindParam(":phone", $this->phone);


     if ($stmt->execute()) {
         return true;
     }
     return false;
 }

    // DELETE
    public function delete()
    {
        $sqlQuery = "DELETE FROM " . $this->table_name . " WHERE customerID = ?";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->customerID = htmlspecialchars(strip_tags($this->customerID));

        $stmt->bindParam(1, $this->customerID);

        if ($stmt->execute()) {
            return true;
        }
    }
}

?>