<?php
include_once '../../config/database.php';
include_once '../class/admin.php';
session_start();
$database = new Database();
$db = $database->getConnection();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../emails/src/Exception.php';
require '../../emails/src/PHPMailer.php';
require '../../emails/src/SMTP.php';

$mail = new PHPMailer(true);
$emailID = $_POST['email'];
$_SESSION['otpmail']= $emailID;
$otp = mt_rand(100000, 999999);
if(isset($emailID)){
    $date = date('Y-m-d');
    $sql = "UPDATE `customer` SET `otp`='$otp' , `updatePassword`= '$date' WHERE `email`='$emailID'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'learnernila@gmail.com';
    $mail->Password   = 'pxvoeoiqcxnkljev';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom('learnernila@gmail.com', 'Nila');
    $mail->addAddress($emailID, 'HI');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Dont share your otp';
    $mail->Body    = $otp;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

   

    echo 'Message has been sent';
    header("Location: ../../otp.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
