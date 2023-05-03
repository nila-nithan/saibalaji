<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
session_start();

include_once '../../config/database.php';
include_once '../class/bannerDB.php';

$database = new Database();
$db = $database->getConnection();
$user = new Banner($db);

$data = json_decode(file_get_contents("php://input"));

$user->id = $data->id;
if($user->delete()){
    $response['status'] = 1; 
    $response['message'] = 'Banner delete successfully.'; 
} else {
    $response['status'] = 0;
    $response['message'] = 'Banner to delete product.';
}

echo json_encode($response);
exit();
?>