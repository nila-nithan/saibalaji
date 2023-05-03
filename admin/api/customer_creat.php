<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
session_start();

include_once '../../config/database.php';
include_once '../class/customerDB.php';

$database = new Database();
$db = $database->getConnection();
$user = new Customer($db);

$data = json_decode(file_get_contents("php://input"));

// check if email or phone already exists
if ($user->emailExists($_POST['email'])) {
    $response = array(
        "status" => "emailError",
        "message" => "Email already exists."
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

if ($user->phoneExists($_POST['phone'])) {
    $response = array(
        "status" => "PhoneError",
        "message" => "Phone number already exists."
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

date_default_timezone_set("Asia/Kolkata");
//$user->dd = date('F, d Y');
$user->customerName = $_POST['customerName'];
$user->email = $_POST['email'];
$user->phone = $_POST['phone'];
$user->password = $_POST['password'];

if ($user->create()) {
    $register = array(
        "productName" => $user->customerName,
        "email" => $user->email,
        "phone" => $user->phone,
        "password" => $user->password
    );
    $response = array(
        "status" =>"success",
        "message" =>"Customer Register successfully.",
        "Customer" => $register
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
} else {
    $response = array("message" => "Customer Register failure.");
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>