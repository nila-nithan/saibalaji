<?php

class Customer
{
    private $conn;
    private $table_name = "customer";

    public $id;
    public $customerName;
    public $email;
    public $phone;
    public $password;
    

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
    
    public function emailExists($email)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $email);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function phoneExists($phone)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE phone = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $phone);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function create()
    {
        $sqlQuery = "INSERT INTO " . $this->table_name . " (`customerName`, `email`, `phone`, `password`) VALUES (:customerName, :email, :phone, :password)";
        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->customerName = htmlspecialchars(strip_tags($this->customerName));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->password = htmlspecialchars(strip_tags($this->password));
    
      
        // bind data
        $stmt->bindParam(":customerName", $this->customerName);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":password", $this->password);
  
 

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


    public function checkCustomerLogin() {
            
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = ? AND password = ? LIMIT 0,1";
        
        $stmt = $this->conn->prepare($query);
        
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=htmlspecialchars(strip_tags($this->password));
        
        $stmt->bindParam(1, $this->email);
        $stmt->bindParam(2, $this->password);
    
        $stmt->execute();
        
        $num = $stmt->rowCount();
        
        if($num>0){
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $data[] = array(
            $this->id = $row['id'],
            $this->customerName = $row['customerName'],
            $this->phone = $row['phone'],
            $this->email = $row['email'],
            $this->password = $row['password']
            );

            return true;
        }
        
        return false;
    }
    public function OTPcheck() {
            
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = ? AND otp = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->otp=htmlspecialchars(strip_tags($this->otp));
        $stmt->bindParam(1, $this->email);
        $stmt->bindParam(2, $this->otp);
        $stmt->execute();
        $num = $stmt->rowCount();
        if($num>0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $data[] = array(
            $this->id = $row['id'],
            $this->customerName = $row['customerName'],
            $this->phone = $row['phone'],
            $this->email = $row['email'],
            $this->otp = $row['otp']
            );
            return true;
        }
        return false;
    }
    public function Resetpassword() {
        $query = "UPDATE " . $this->table_name . " SET password = ? WHERE email = ?";
        $stmt = $this->conn->prepare($query);

        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->email=htmlspecialchars(strip_tags($this->email));

        $stmt->bindParam(1, $this->password);
        $stmt->bindParam(2, $this->email);
        $stmt->execute();

        return true;
    }


}
