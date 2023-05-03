<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../class/categoryDB.php';

$database = new Database();
$db = $database->getConnection();
$user = new Category($db);

$stmt = $user->getAll();
$itemCount = $stmt->rowCount();

if ($itemCount > 0) {
    $category = array();
    $category["status"] = "success";
    $category["message"] = "category view";
    $category["categories"] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "id" => $id,
            "name" => $categoryName,
            "image" => $image,
        );
        array_push($category["categories"], $e);
    }
    echo json_encode($category);
} else {
    http_response_code(404);
    echo json_encode(
        array("status" => "error", "message" => "No categories found.")
    );
}
