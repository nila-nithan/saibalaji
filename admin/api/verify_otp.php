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

$user->otp = isset($_POST['otp']) ? $_POST['otp'] : die(json_encode(array("message" => "Missing otp field")));
$user->email = isset($_POST['email']) ? $_POST['email'] : die(json_encode(array("message" => "Missing otp field")));
if($user->OTPcheck()){
    $_SESSION['email'] = $user->email;
    http_response_code(200);
    $Data = array(
        "customerName" => $user->customerName,
        "email" => $user->email,
        "otp" => $user->otp
    );
    $response = array(
        "status" => true,
        "message" => "OTP validation successfully.",
        "cartData" => $Data
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
} else {
    $response = array("status" => false,"message" => "Cart added failure.");
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>