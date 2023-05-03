<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
session_start();

include_once '../../config/database.php';
include_once '../class/categoryDB.php';

$database = new Database();
$db = $database->getConnection();
$user = new Category($db);

$data = json_decode(file_get_contents("php://input"));

$user->id = $_GET['id'];
    if($user->delete()){
        echo '1';
        exit();
    } else{
        echo '0';
        exit();
    }

?>