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

$user->product_id = $_POST['product_id'];

if ($user->delete()) {
  
    $response = array(
        "status" => "true.",
        "message" => "Cart delete successfully."
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
} else {
    $response = array("status" => "false.","message" => "Cart delete failure.");
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
