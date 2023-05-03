<?php
include("../config/database.php");


$database = new Database();
$conn = $database->getConnection();

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $sql = "UPDATE `orders` SET `delivery_status`='Shipping' WHERE `order_id`='$order_id' ";
}elseif(isset($_GET['id'])){
    $order_id = $_GET['id'];
    $sql = "UPDATE `orders` SET `delivery_status`='delivered' WHERE `order_id`='$order_id' ";
}
$ordersstmt = $conn->query($sql);
$row = $ordersstmt->fetch(PDO::FETCH_ASSOC);
$ordersstmt->execute();

if ($ordersstmt) {
    echo json_encode(['status' => 'success']); // send success response as text
} else {
    echo json_encode(['status' => 'failed']); // send error response as text
}
?>