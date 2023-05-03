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

$user->email = isset($_POST['email']) ? $_POST['email'] : die(json_encode(array("message" => "Missing email field")));
$user->password = isset($_POST['password']) ? $_POST['password'] : die(json_encode(array("message" => "Missing password field")));
 
if($user->checkCustomerLogin()){
    $_SESSION['id'] = $user->id;
    $_SESSION['customerName'] = $user->customerName;
    http_response_code(200);
    echo json_encode(array(
        "status" => true,
        "message" => "Login successful.",
        "data" => array(
            "id" => $user->id,
            "customerName" => $user->customerName,
            "phone" => $user->phone,
            "email" => $user->email
        )
    ));
    
    // header("Location: index.php");
} else {
    http_response_code(200);
    echo json_encode(array("status" => false,"message" => "Invalid login credentials."));
}
?>