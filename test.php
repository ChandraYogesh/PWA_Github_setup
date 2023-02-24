<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);
require_once('stripe-php/init.php'); 
	
    //set stripe secret key and publishable key
    $stripe = array(
      "secret_key"      => "sk_test_51LCrEBJPfbfzje02NYceKQNcxkYCocbDdLhdwJ3xMxBpvzy9xmFYBzZ247lVepjce5RXb2Pb8xny6fSdiis1Ugtf00eVLsnICw",
      "publishable_key" => "pk_test_51LCrEBJPfbfzje02cGGuiKfWFTikU4sHdU7XN13cr0EzRRHRThNfecBFmI9wIzZ3WRaLJbA5IACZ5tU1kO3dpCUw007mxAvgeb"
    );    
	
    \Stripe\Stripe::setApiKey($stripe['secret_key']);  
    
    
  $customer= \Stripe\Customer::all(['limit' => 10]);
    
    $customer->delete('cus_MzZEfsFKaeJIJn',[]);

    echo "<pre>";
    print_r($customer);
    echo "</pre>";
    die();
    
    $stripe = new \Stripe\StripeClient("sk_test_51LCrEBJPfbfzje02NYceKQNcxkYCocbDdLhdwJ3xMxBpvzy9xmFYBzZ247lVepjce5RXb2Pb8xny6fSdiis1Ugtf00eVLsnICw");
    
    print_r($stripe);

// use PHPMailer\PHPMailer\PHPMailer; 
// use PHPMailer\PHPMailer\Exception; 
// require 'phpmailer/src/Exception.php'; 
// require 'phpmailer/src/PHPMailer.php'; 
// require 'phpmailer/src/SMTP.php';
// require('dbConnECTT.php');

// $pwa_email="amul@cvinfotech.com";
// $mail = new PHPMailer(true);  
// try { 
//       $mail->SMTPDebug = 0;                                                                                                    
//       $mail->isSMTP();                                                                                                                         
//       $mail->Host        = 'smtp-mail.outlook.com';                                                        
//       $mail->SMTPAuth = true;                                                                           
//       $mail->Username = 'chargetime@troenergy.io';                                     
//       $mail->Password = 'TROOnline5';                                                              
//       $mail->SMTPSecure = 'STARTTLS';                                                                         
//       $mail->Port         = 587; 
//       $mail->setFrom('chargetime@troenergy.io', 'TRO Energy Solutions');             
//       $mail->addAddress($pwa_email); // where you want to send mail 
//       $mail->isHTML(true);                                      
//       $mail->Subject = "Please Confirm your email registration | TRO Energy Solutions!";
//       $mail->Body = "Thank you for setting up your account with $chargetime2<br/> Please $linkmail to finish setting up your account.<br/><br/>Welcome Home! $chargetime2<br/>$imagelink";
//       // $mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
//       $mail->send(); 
//       $_SESSION['resend_email'] = 'Mail has been sent successfully';
//       // header('location:email_verify.php');
//       //exit(); 
// } catch (Exception $e) { 
//           echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
//             echo "Error: " . $sql . "<br>" . mysqli_error($con);
// }
    ?>
    