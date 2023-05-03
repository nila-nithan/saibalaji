<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
session_start();

include_once '../../config/database.php';
include_once '../class/cartDB.php';

$database = new Database();
$db = $database->getConnection();
$user = new Cart($db);

$data = json_decode(file_get_contents("php://input"));


if (isset($_POST['customerID'])) {
    $user->customerID = $_POST['customerID'];
} else {
    $user->customerID = $_SESSION['id'];
}
if (isset($_POST['quantity'])) {
    $user->quantity = $_POST['quantity'];
} else {
    $qty = 1;
    $user->quantity = $qty;
}

$user->product_id = $_POST['product_id'];
// $user->customerID = $_POST['customerID'];
// $user->quantity = $_POST['quantity'];


$select_sql = "SELECT * FROM `products` where `id` = ?";
$stmt = $db->prepare($select_sql);
$stmt->bindParam(1, $user->product_id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$user->productName = $row['productName'];
$user->image = $row['image'];
$user->price = $row['salesPrice'];
$user->total = $user->price * $user->quantity;

if ($user->create()) {
    $cartData = array(
        "productName" => $user->productName,
        "image" => "http://192.168.1.13/saibalaji/upload/product/".$user->image,
        "price" => $user->price,
        "quantity" => $user->quantity,
        "total" => $user->total
    );
    $response = array(
        "status" => true,
        "message" => "Cart added successfully.",
        "cartData" => $cartData
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
} else {
    $response = array("message" => "Cart added failure.");
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
