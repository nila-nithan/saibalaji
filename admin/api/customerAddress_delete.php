<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
session_start();

include_once '../../config/database.php';
include_once '../class/customerAddressDB.php';

$database = new Database();
$db = $database->getConnection();
$user = new Customeraddress($db);

$data = json_decode(file_get_contents("php://input"));

date_default_timezone_set("Asia/Kolkata");
//$user->dd = date('F, d Y');

$user->customerID = $_POST['customerID'];


if($user->delete()){
    echo 'customer address delete successfully.';
} else{
    echo 'customer address could not be delete.';
}

?>