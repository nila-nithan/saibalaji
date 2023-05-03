<?php

class Banner
{

    private $conn;
    private $table_name = "banner";

    public $id;
    public $banner;

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
        $sqlQuery = "INSERT INTO " . $this->table_name . " (banner) VALUES (:image)";
        $stmt = $this->conn->prepare($sqlQuery);
        // sanitize
        $this->image = htmlspecialchars(strip_tags($this->image));
        // bind data
        $stmt->bindParam(":image", $this->image);

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