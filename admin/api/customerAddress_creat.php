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
if (isset($_POST['customerID'])) {
    $user->customerID = $_POST['customerID'];
} else {
    $user->customerID = $_SESSION['id'];
}
$user->doorNo = $_POST['doorNo'];
$user->area = $_POST['area'];
$user->landmark = $_POST['landmark'];
$user->town = $_POST['town'];
$user->state = $_POST['state'];
$user->pincode = $_POST['pincode'];
$user->phone = $_POST['phone'];

if($user->create()){

    $address = array(
        "customerID" => $user->customerID,
        "doorNo" => $user->doorNo,
        "area" => $user->area,
        "landmark" => $user->landmark,
        "town" => $user->town,
        "state" => $user->state,
        "pincode" => $user->pincode,
        "phone" => $user->phone
    );
    $response = array(
        "status" => "success.",
        "message" => "customer address created successfully.",
        "datas" => $address
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
} else{
    $response = array(
        "status" => "failure.",
        "message" => "customer address created failure."
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

?>