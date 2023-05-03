<?php

class Admin {
    
    private $conn;
    private $table_name = "admin";
    
    public $id;
    public $adminName;
    public $email;
    public $phone;
    public $password;
    public $created_at;
    public $updated_at;
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function create() {
        
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    adminName = :adminName,
                    email = :email,
                    password = :password,
                    created_at = :created_at,
                    updated_at = :updated_at";
        
        $stmt = $this->conn->prepare($query);
        
        $this->adminName=htmlspecialchars(strip_tags($this->adminName));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->created_at=date('Y-m-d H:i:s');
        $this->updated_at=date('Y-m-d H:i:s');
        
        $stmt->bindParam(":adminName", $this->adminName);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":created_at", $this->created_at);
        $stmt->bindParam(":updated_at", $this->updated_at);
        
        if($stmt->execute()){
            return true;
        }
        
        return false;
        
    }
    
    public function checkLogin() {
        
        $query = "SELECT id, email, password FROM " . $this->table_name . " WHERE email = ? AND password = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $stmt->bindParam(1, $this->email);
        $stmt->bindParam(2, $this->password);
        $stmt->execute();
        $num = $stmt->rowCount();
        
        if($num>0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->email = $row['email'];
            $this->password = $row['password'];
            
            return true;
        }
        
        return false;
    }
 
    
}
