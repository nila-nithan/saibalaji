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
// $user->customerID = 5;

$stmt = $user->checkout();
$itemCount = $stmt->rowCount();

//    echo json_encode($itemCount);
if ($itemCount > 0) {
    $checkout["itemCount"] = $itemCount;
    $grandTotal = 0;
    $storeCharge = 50 ;
    $deliveryCharge = 10 ;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $price = $salesPrice * $quantity;
        $grandTotal += $price;

        $checkout[] = array(
            "salesPrice" => $salesPrice,
            "productName" => $productName,
            "salesPrice" => $salesPrice,
            "quantity" => $quantity,
            "stocks" => $stock_qty,
            "price" => $price
        );
    }
    $checkout["storeCharge"] = $storeCharge;
    $checkout["deliveryCharge"] = $deliveryCharge;
    $checkout["grandTotal"] = $grandTotal +$storeCharge +$deliveryCharge ;
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}

$stmt = $user->address();
$itemCount = $stmt->rowCount();

//    echo json_encode($itemCount);
if ($itemCount > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $address[] = array(
            "doorNo" => $doorNo,
            "area" => $area,
            "landmark" => $landmark,
            "town" => $town,
            "state" => $state,
            "pincode" => $pincode,
            "phone" => $phone
        );
    }
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
echo json_encode(array("status" => true, "msg" => "checkout page complete data!", "checkout Items" => $checkout, "address" => $address));
