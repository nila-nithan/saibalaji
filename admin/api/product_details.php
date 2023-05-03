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

   $user->id = isset($_POST['id']) ? $_POST['id'] : die();
//    $user->id = 6;
  
   $user->getSingleProduct();
   if($user->id != null){
       // create array
       $product_details = array(
           "productName" =>  $user->productName,
           "salesPrice" => $user->salesPrice,
           "actualPrice" => $user->actualPrice,
           "categoryName" => $user->categoryName,
           "image" => $user->image,
           "image2" => $user->image2,
           "image3" => $user->image3,
           "image4" => $user->image4,
           "image5" => $user->image5,
           "description" => $user->description,
       );
      
       http_response_code(200);
       echo json_encode(array("status" => true, "message" => "product deatails.","data" => $product_details));
   }
     
   else{
       http_response_code(404);
       echo json_encode("Employee not found.");
   }
?>