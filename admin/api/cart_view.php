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

$user->customerID = isset($_POST['customerID']) ? $_POST['customerID'] : die();
//    $user->customerID = 5;

   $stmt = $user->getAll();
   $itemCount = $stmt->rowCount();

//    echo json_encode($itemCount);
   if($itemCount > 0){
       
       $cart = array();
       $cart["cart"] = array();
       $cart["itemCount"] = $itemCount;
       while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
           extract($row);
           $c = array(
               "image" => "http://192.168.1.13/saibalaji/upload/product/".$image,
               "productName" => $productName,
               "salesPrice" => $salesPrice,
               "quantity" => $quantity,
               "total" => $total
           );
           array_push($cart["cart"], $c);
       }
    //    echo json_encode($cart);
       echo json_encode(array("status" => true, "message" => "cart datas view!", "data" => $cart));
   }
   else{
       http_response_code(404);
       echo json_encode(
           array("status" => false, "message" => "cart datas view failure !")
       );
   }
?>