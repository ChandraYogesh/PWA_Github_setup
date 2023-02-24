<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

    require("PHPMailer-master/src/PHPMailer.php");
    require("PHPMailer-master/src/SMTP.php");
    require("PHPMailer-master/src/Exception.php");
  
   $mail = new PHPMailer\PHPMailer\PHPMailer(true);
  
try {
    $mail->SMTPDebug = 2;                                       
    // $mail->isSMTP();                                            
    $mail->Host       = 'smtp-mail.outlook.com';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'Chargetime@troenergy.io';                 
    $mail->Password   = 'TROonline2022';                        
    //$mail->SMTPSecure = 'STARTTLS';  
$mail->SMTPSecure = 'ssl'; //secure transfer enabled
                            
    $mail->Port       = 587;  
  
    $mail->setFrom('Chargetime@troenergy.io');           
    $mail->addAddress('vikramjeet@cvinfotech.com', 'Vikramjeet');
       
    $mail->isHTML(true);                                  
    $mail->Subject = 'Subject';
    $mail->Body    = 'HTML message body in <b>bold</b> ';
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';

    if( $mail->send() )
         echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>