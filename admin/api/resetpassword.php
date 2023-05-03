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

$user->password = isset($_POST['password']) ? $_POST['password'] : die(json_encode(array("message" => "Missing password field")));
$user->email = isset($_POST['email']) ? $_POST['email'] : die(json_encode(array("message" => "Missing email field")));
if($user->Resetpassword()){
    http_response_code(200);
    $Data = array(
        "customerName" => $user->customerName,
        "email" => $user->email,
        "password" => $user->password
    );
    $response = array(
        "status" => true,
        "message" => "password reset successfully.",
        "cartData" => $Data
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
} else {
    $response = array("status" => false,"message" => "password reset failure.");
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>