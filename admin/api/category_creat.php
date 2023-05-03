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

date_default_timezone_set("Asia/Kolkata");
//$user->dd = date('F, d Y');


$user->categoryName = $_POST['categoryName'];

$fileName = $_FILES["image"]["name"]; 									
$fileTmpLoc = $_FILES["image"]["tmp_name"]; 
$fileType = $_FILES["image"]["type"];
$fileSize = $_FILES["image"]["size"];
$fileErrorMsg = $_FILES["image"]["error"];
$kaboom = explode(".", $fileName); 
$fileExt = end($kaboom);
        if (!$fileTmpLoc) 
        {
            $file = 'no_img.jpg';
        }
        else if($fileSize > 524288000)
        {
            $file = "ERROR: Your file was larger than 5 Mb in size."; unlink($fileTmpLoc);
            echo '2';
            exit();
        }
        else if (!preg_match("/.(gif|jpg|png|jpeg|svg|mp3|mp4|pdf)$/i", $fileName) )
        {
            $file = "ERROR: Your file format is bad."; unlink($fileTmpLoc);
            echo '3';
            exit();

        }
        else if ($fileErrorMsg == 1)
        {
            $file = "ERROR: An error occured while processing the file. Try again.";
        }
        $moveResult = move_uploaded_file($fileTmpLoc, "../../upload/category/$fileName");
        if($moveResult!= true)
        {
             $fileName = $file;
        } 

$user->image = $fileName;

    if($user->create()){
        echo '1';
        echo 'category created successfully.';
        exit();
    } else{
        echo '0';
        exit();
    }

?>