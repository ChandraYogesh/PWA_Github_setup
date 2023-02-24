<?php
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
require 'phpmailer/src/Exception.php'; 
require 'phpmailer/src/PHPMailer.php'; 
require 'phpmailer/src/SMTP.php';
require('dbConnECTT.php');
function wh_log($log_msg)
{
    $log_filename = "log";
    if (!file_exists($log_filename)) 
    {
        // create directory/folder uploads.
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/log_' . date('d-M-Y') . '.log';
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}

if(isset($_POST['pwa_createbtn'])) {

  $pwa_name = mysqli_real_escape_string($con,$_POST['pwa_name']);
  $pwa_email = mysqli_real_escape_string($con,$_POST['pwa_email']);

  $sql_check_mail = "SELECT id FROM `pwa_registration` WHERE pwa_email='".$pwa_email."'";
  $result = mysqli_query($con, $sql_check_mail);
  if (mysqli_num_rows($result) > 0) {
    $_SESSION['email_used'] = 'Email id is already used!';
    header('location:https://tro.tentoptoday.com/signup.php');
    exit();
  }
$pwa_password = mysqli_real_escape_string($con,$_POST['pwa_password']);
// $pwa_cpassword = mysqli_real_escape_string($con,$_POST['pwa_cpassword']);
$pwa_mobile = mysqli_real_escape_string($con,$_POST['pwa_mobile']);
$pwa_choices = mysqli_real_escape_string($con,$_POST['pwa_choices']);
$pwa_address1 = mysqli_real_escape_string($con,$_POST['pwa_address1']);
$pwa_address2 = mysqli_real_escape_string($con,$_POST['pwa_address2']);
$pwa_zipcode = mysqli_real_escape_string($con,$_POST['pwa_zipcode']);
$pwa_state = mysqli_real_escape_string($con,$_POST['pwa_state']);
$date_today = date('Y-m-d');
$email_token = mysqli_real_escape_string($con,$_POST['email_token']);


$sqlinsert = "INSERT INTO `pwa_registration`(`pwa_name`, `pwa_email`, `pwa_password`, `pwa_mobile`, `pwa_choice`, `pwa_add1`, `pwa_add2`, `pwa_zip`, `pwa_state`,`pwa_status`, `pwa_date`,`email_token`) VALUES ('$pwa_name','$pwa_email','$pwa_password','$pwa_mobile','$pwa_choices','$pwa_address1','$pwa_address2','$pwa_zipcode','$pwa_state','0','$date_today','$email_token')";
$linkmail = "<a href='https://tro.tentoptoday.com/email_confirmed.php?pwa_emailid=".$pwa_email." &email_token=".$email_token."'>click here</a>";
$chargetime2 = "<a href='https://tro.tentoptoday.com/email_confirmed.php?pwa_emailid=".$pwa_email."'><b>ChargeTime<img src='https://tro.tentoptoday.com/images/cpsymbol2.png'></b></a>";
$imagelink = "<a href='https://tro.tentoptoday.com/email_confirmed.php?pwa_emailid=".$pwa_email."'><img src='https://tro.tentoptoday.com/images/logoicon.png'></a>";




 $log_time = date('Y-m-d h:i:sa');

  
wh_log("************** Start Log For Day : '" . $log_time . "'**********");
wh_log($sqlinsert);
wh_log("************** END Log For Day : '" . $log_time . "'**********");
 










if (mysqli_query($con, $sqlinsert)) {
  $_SESSION['email_verify'] = $pwa_email;
  // echo "New record created successfully";
  // mail code 
 $mail = new PHPMailer(true);  
 try { 
        $mail->SMTPDebug = 0;                                                                                                    
        $mail->isSMTP();                                                                                                                         
        $mail->Host        = 'smtp-mail.outlook.com';                                                        
        $mail->SMTPAuth = true;                                                                           
        $mail->Username = 'chargetime@troenergy.io';                                     
        $mail->Password = 'TROOnline5';                                                              
        $mail->SMTPSecure = 'STARTTLS';                                                                         
        $mail->Port         = 587; 
        $mail->setFrom('chargetime@troenergy.io', 'TRO Energy Solutions');             
        $mail->addAddress($pwa_email); // where you want to send mail 
        $mail->isHTML(true);                                      
        $mail->Subject = 'Please Confirm your email registration | TRO Energy Solutions!'; 
        $mail->Body = "Thank you for setting up your account with $chargetime2<br/> Please $linkmail to finish setting up your account.<br/><br/>Welcome Home! $chargetime2<br/>$imagelink"; 
        // $mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
        $mail->send(); 
        header('location:email_verify.php');
        exit();
        echo "Mail has been sent successfully!"; 
 } catch (Exception $e) { 
            //  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
             echo "Error: " . $sql . "<br>" . mysqli_error($con);
 }
  // mail code 


  
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
}
else {
header('location:email_verify.php');
exit();
}
mysqli_close($con);
?>