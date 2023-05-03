<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
session_start();

include_once '../../config/database.php';
include_once '../class/paymentDB.php';

$database = new Database();
$db = $database->getConnection();
$user = new Payment($db);

$data = json_decode(file_get_contents("php://input"));

$order_id = 'ORD' . date('YmdHis');
$payment_id = 'PAY' . date('YmdHis') . $_POST['customer_id'];


$user->payment_id = $payment_id;
$user->order_id = $order_id;

$user->customer_id = $_POST['customer_id'];
$user->payment_status = $_POST['payment_status'];
$user->grand_total = $_POST['grand_total'];
$user->delivery_status = 'processing';

if ($user->payment_status == 'success') {

    if ($user->create()) {
        $payment_status = array(
            "customer_id" => $user->customer_id,
            "payment_status" => $user->payment_status,
            "grand_total" => $user->grand_total,
            "delivery_status" => $user->delivery_status
        );
        $response = array(
            "status" => true,
            "message" => "payment successfully.",
            "payment_status" => $payment_status
        );
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }
}else{
    $response = array(
        "status" => false,
        "message" => "payment failure."
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>
