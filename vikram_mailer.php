<?php
 use PHPMailer\PHPMailer\PHPMailer; 
 use PHPMailer\PHPMailer\Exception; 
 require 'phpmailer/src/Exception.php'; 
 require 'phpmailer/src/PHPMailer.php'; 
 require 'phpmailer/src/SMTP.php'; 
 //require 'vendor/autoload.php'; 
 $mail = new PHPMailer(true);  
 try { 
        $mail->SMTPDebug = 2;                                                                                                    
        $mail->isSMTP();                                                                                                                         
        $mail->Host        = 'smtp-mail.outlook.com';                                                        
        $mail->SMTPAuth = true;                                                                           
        $mail->Username = 'Chargetime@troenergy.io';                                     
        $mail->Password = 'TROonline2022';                                                              
        $mail->SMTPSecure = 'STARTTLS';                                                                         
        $mail->Port         = 587; 
        $mail->setFrom('Chargetime@troenergy.io', 'TRO Energy Solutions');             
        $mail->addAddress('vikramjeet@cvinfotech.com'); // where you want to send mail 
        $mail->isHTML(true);                                      
        $mail->Subject = 'Subject'; 
        $mail->Body = 'HTML message body in <b>bold vikram</b> '; 
        $mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
        $mail->send(); 
        echo "Mail has been sent successfully!"; 
 } catch (Exception $e) { 
             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
 } 
 ?> 