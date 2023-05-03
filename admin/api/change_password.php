<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
session_start();

include_once '../../config/database.php';
include_once '../class/admin.php';

$database = new Database();
$db = $database->getConnection();
$user = new Admin($db);

$data = json_decode(file_get_contents("php://input"));

if(isset($_POST['oldpass']) && isset($_POST['newpass'])){
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    
    $sql = "SELECT * FROM `admin` where `password` = :oldpass";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":oldpass", $oldpass);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $query="UPDATE `admin` SET `password`=:newpass";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":newpass", $newpass);
        $stmt->execute();
        echo '1';
    } else {
        echo '0';
    }
}

?>