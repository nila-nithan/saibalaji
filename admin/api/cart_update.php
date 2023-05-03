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


$select_sql = "SELECT * FROM `products` where `id` = ?";
$stmt = $db->prepare($select_sql);
$stmt->bindParam(1, $user->product_id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$user->productName = $row['productName'];
$user->price = $row['salesPrice'];
$user->total = $user->price * $user->quantity;

if ($user->updateCart()) {
    $cartData = array(
        "productName" => $user->productName,
        "price" => $user->price,
        "quantity" => $user->quantity,
        "total" => $user->total
    );
    $response = array(
        "status" => true,
        "message" => "Cart update successfully.",
        "cartData" => $cartData
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
} else {
    $response = array("message" => "Cart update failure.");
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
