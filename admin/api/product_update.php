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

$data = json_decode(file_get_contents("php://input"));

date_default_timezone_set("Asia/Kolkata");
$user->updateDate = date("Y-m-d");


$user->id = $_POST['id'];
$user->productName = $_POST['productName'];
$user->salesPrice = $_POST['salesPrice'];
$user->actualPrice = $_POST['actualPrice'];
$user->categoryName = $_POST['categoryName'];
$user->quantity = $_POST['quantity'];

$fileName = $_FILES["image"]["name"]; 
if($fileName != '')	{									
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
        $moveResult = move_uploaded_file($fileTmpLoc, "../../upload/product/$fileName");
        if($moveResult!= true)
        {
             $fileName = $file;
        } 

$user->image = $fileName;
}else{
        
    $user->image = $_POST['oldimage'];
}

$fileName = $_FILES["image2"]["name"]; 
if($fileName != '')	{									
$fileTmpLoc = $_FILES["image2"]["tmp_name"]; 
$fileType = $_FILES["image2"]["type"];
$fileSize = $_FILES["image2"]["size"];
$fileErrorMsg = $_FILES["image2"]["error"];
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
        $moveResult = move_uploaded_file($fileTmpLoc, "../../upload/product/$fileName");
        if($moveResult!= true)
        {
             $fileName = $file;
        } 

$user->image2 = $fileName;
}else{
        
    $user->image2 = $_POST['oldimage2'];;
}
$fileName = $_FILES["image3"]["name"]; 	
if($fileName != '')	{								
$fileTmpLoc = $_FILES["image3"]["tmp_name"]; 
$fileType = $_FILES["image3"]["type"];
$fileSize = $_FILES["image3"]["size"];
$fileErrorMsg = $_FILES["image3"]["error"];
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
        $moveResult = move_uploaded_file($fileTmpLoc, "../../upload/product/$fileName");
        if($moveResult!= true)
        {
             $fileName = $file;
        } 

$user->image3 = $fileName;
}else{
        
    $user->image3 = $_POST['oldimage3'];;
}
$fileName = $_FILES["image4"]["name"];
if($fileName != '')	{ 									
$fileTmpLoc = $_FILES["image4"]["tmp_name"]; 
$fileType = $_FILES["image4"]["type"];
$fileSize = $_FILES["image4"]["size"];
$fileErrorMsg = $_FILES["image4"]["error"];
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
        $moveResult = move_uploaded_file($fileTmpLoc, "../../upload/product/$fileName");
        if($moveResult!= true)
        {
             $fileName = $file;
        } 

$user->image4 = $fileName;
}else{
        
    $user->image4 = $_POST['oldimage4'];;
}
$fileName = $_FILES["image5"]["name"]; 	
if($fileName != '')	{								
$fileTmpLoc = $_FILES["image5"]["tmp_name"]; 
$fileType = $_FILES["image5"]["type"];
$fileSize = $_FILES["image5"]["size"];
$fileErrorMsg = $_FILES["image5"]["error"];
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
        $moveResult = move_uploaded_file($fileTmpLoc, "../../upload/product/$fileName");
        if($moveResult!= true)
        {
             $fileName = $file;
        } 

$user->image5 = $fileName;
}else{
        
    $user->image5 = $_POST['oldimage5'];;
}

if($user->update()){
    $response['status'] = 1; 
    $response['message'] = 'Product updted successfully.'; 
} else {
    $response['status'] = 0;
    $response['message'] = 'Failed to updted product.';
}

echo json_encode($response);
exit();

?>