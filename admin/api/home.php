<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
session_start();

include_once '../../config/database.php';
include_once '../class/homeDB.php';

$database = new Database();
$db = $database->getConnection();
$user = new Home($db);


$stmt = $user->banner();
$itemCount = $stmt->rowCount();

if ($itemCount > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $banners = "http://192.168.1.13/saibalaji/upload/banner/".$row['banner'];
        $banner[] = array(
            "banner" => $banners,
        );
    }
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}

$stmt = $user->category();
$itemCount = $stmt->rowCount();

//    echo json_encode($itemCount);
if ($itemCount > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $category[] = array(
            "categoryID" => $id,
            "categoryName" => $categoryName,
            "image" => "http://192.168.1.13/saibalaji/upload/category/".$image,
        );
    }
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}

$stmt = $user->products();
$itemCount = $stmt->rowCount();

//    echo json_encode($itemCount);
if ($itemCount > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $products[] = array(
            "productID" => $id,
            "productName" => $productName,
            "salesPrice" => $salesPrice,
            "image" => "http://192.168.1.13/saibalaji/upload/product/".$image,
        );
    }
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
echo json_encode(array("status" => true, "msg" => "Home page complete data!", "banners" => $banner, "category" => $category, "products" => $products));
