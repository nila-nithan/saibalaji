<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
session_start();

include_once '../../config/database.php';
include_once '../class/productDB.php';

$database = new Database();
$db = $database->getConnection();
$user = new Product($db);

$data = json_decode(file_get_contents("php://input"));

date_default_timezone_set("Asia/Kolkata");
//$user->dd = date('F, d Y');


$user->id = $data->id;
if($user->delete()){
    $response['status'] = 1; 
    $response['message'] = 'Product delete successfully.'; 
} else {
    $response['status'] = 0;
    $response['message'] = 'Failed to delete product.';
}

echo json_encode($response);
exit();

?>