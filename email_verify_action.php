<?php
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
require 'phpmailer/src/Exception.php'; 
require 'phpmailer/src/PHPMailer.php'; 
require 'phpmailer/src/SMTP.php';
require('dbConnECTT.php');
if(isset($_POST['pwa_createbtn'])) {
// echo 'hello';
// die();

// $pwa_email = $_POST['resend_emailvalue'];
// $email_token = $_POST['email_token'];
// $otp = rand(100000,999999);
// print_r($email_token);
//  die();
$pwa_email = $_POST['resend_emailvalue'];
// print_r($pwa_email); die();
$otp = rand(100000,999999);

$update = "UPDATE `pwa_registration` SET `email_token`= '$otp' WHERE pwa_email='$pwa_email'";
// print_r($update); die();
// $sql = "SELECT email_token FROM `pwa_registration`";
 if (mysqli_query($con, $update)) {
     
$linkmail = "<a href='https://tro.tentoptoday.com/email_confirmed.php?pwa_emailid=".$pwa_email."&email_token=".$otp."'>click here</a>";
$chargetime2 = "<a href='https://tro.tentoptoday.com/email_confirmed.php?pwa_emailid=".$pwa_email."'><b>ChargeTime<img src='https://tro.tentoptoday.com/images/cpsymbol2.png'></b></a>";
$imagelink = "<a href='https://tro.tentoptoday.com/email_confirmed.php?pwa_emailid=".$pwa_email."'><img src='https://tro.tentoptoday.com/images/logoicon.png'></a>";

// mail code 
$mail = new PHPMailer(true);  
try { 
       $mail->SMTPDebug = 0;                                                                                                    
       $mail->isSMTP();                                                                                                                         
       $mail->Host        = 'smtp-mail.outlook.com';                                                        
       $mail->SMTPAuth = true;                                                                           
       $mail->Username = 'Chargetime@troenergy.io';                                     
       $mail->Password = 'TROOnline5';                                                              
       $mail->SMTPSecure = 'STARTTLS';                                                                         
       $mail->Port         = 587; 
       $mail->setFrom('Chargetime@troenergy.io', 'TRO Energy Solutions');             
       $mail->addAddress($pwa_email); // where you want to send mail 
       $mail->isHTML(true);                                      
       $mail->Subject = "Please Confirm your email registration | TRO Energy Solutions!";
       $mail->Body = "Thank you for setting up your account with $chargetime2<br/> Please $linkmail to finish setting up your account.<br/><br/>Welcome Home! $chargetime2<br/>$imagelink";
       // $mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
       $mail->send(); 
    //   print_r($mail); die();
       $_SESSION['resend_email'] = 'Mail has been sent successfully';
       header('location:email_verify.php');
       exit(); 
} catch (Exception $e) { 
           echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
 // mail code 
}
}
?>