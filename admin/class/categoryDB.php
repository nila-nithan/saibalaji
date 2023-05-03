<?php

class Category
{

    private $conn;
    private $table_name = "category";

    public $id;
    public $categoryName;
    public $image;
    public $updateDate;

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
        $sqlQuery = "INSERT INTO " . $this->table_name . " (categoryName, image) VALUES (:categoryName, :image)";
        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->categoryName = htmlspecialchars(strip_tags($this->categoryName));
        $this->image = htmlspecialchars(strip_tags($this->image));

        // bind data
        $stmt->bindParam(":categoryName", $this->categoryName);
        $stmt->bindParam(":image", $this->image);

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
        $sqlQuery = "UPDATE " . $this->table_name . " SET categoryName = :categoryName, image = :image, updateDate = :updateDate WHERE id = :id";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->categoryName = htmlspecialchars(strip_tags($this->categoryName));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->updateDate = htmlspecialchars(strip_tags($this->updateDate));

        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":categoryName", $this->categoryName);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":updateDate", $this->updateDate);

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