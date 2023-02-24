<?php
 use PHPMailer\PHPMailer\PHPMailer; 
 use PHPMailer\PHPMailer\Exception; 
 require 'phpmailer/src/Exception.php'; 
 require 'phpmailer/src/PHPMailer.php'; 
 require 'phpmailer/src/SMTP.php'; 
include('header.php');
if(isset($_POST['pwa_login'])) {
    // echo 'hello';
    // die();
    $sql = "SELECT * FROM `pwa_registration` WHERE pwa_email='".$_POST['pwa_emailid']."'";
      $otp = rand(100000,999999);
    $result = mysqli_query($con, $sql);
    $result_array=mysqli_fetch_assoc($result);
    // print_r($result_array); echo $result_array['pwa_password'];die();
$chargetime2 = "<b>ChargeTime<img src='https://www.troes.io/images/cpsymbol2.png'></b>";
$linkmail = "<a href='https://tro.tentoptoday.com/reset_password.php?pwa_emailid=".$result_array['pwa_email']."&pwa_status=1&email_token=".$otp."'>link</a>";
if (mysqli_num_rows($result) > 0) {
  // output data of each row

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
       $mail->addAddress($_POST['pwa_emailid']); // where you want to send mail 
       $mail->isHTML(true);                                      
       $mail->Subject = "TRO Energy Solutions | Forgot Your Password!";
       $mail->Body = "Hey,<br/><br/>
       It seems like you forgot your password for $chargetime2.<br/>
       Please click this $linkmail to reset your password.<br/><br/>
       If you did not forget your password, please disregard this email. Please do not share your password with anyone.<br/>
       <img src='https://www.troes.io/images/logoicon.png'>";
       // $mail->AltBody = 'Body in plain text for non-HTML mail clients';
        $mail->Send();
        //  print_r($mail); die();
        //  $mail_status = sendOTP($_POST["$mail"],$otp);

		if($mail == 1) {
		//	$result = mysqli_query($con,"update pwa_registration SEt(email_token) VALUES ('" . $otp . "')");
// 		print_r($_POST["pwa_emailid"].'====='. $_POST["otp"]); die();
			$result = mysqli_query($con,"UPDATE pwa_registration SET email_token = '" . $otp. "' WHERE pwa_email = '" . $_POST["pwa_emailid"] . "'");
			$current_id = mysqli_insert_id($con);
			if(!empty($current_id)) {
				$success=1;
			}
		}
       
} catch (Exception $e) { 
           //  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
if(!empty($_POST["submit"])) {
	$result = mysqli_query($con,"SELECT * FROM pwa_registration WHERE pwa_email='" . $_POST["pwa_emailid"] . "' ");
	$count  = mysqli_num_rows($result);
	if(!empty($count)) {
		$result = mysqli_query($con,"UPDATE pwa_registration SET pwa_email = '" . $_POST["pwa_emailid"] . "' WHERE otp = '" . $_POST["otp"] . "'");
		$success = 2;	
	} else {
		$success =1;
		$error_message = "Invalid OTP!";
	}	
}
 // mail code    
    $_SESSION['resend_email'] = 'Password reset mail has been sent successfully. Please check your spam folder as well!!';
    echo '<script>window.location = "https://tro.tentoptoday.com/login.php";</script>';
    exit();
} else {
    $_SESSION['resend_email'] = 'This email id is not registered!';
}
}
?>  
<div class="container">
    <div class="row">
        <div class="welcome_box forgot_box_login1"  style="background-image:url('https://troes.io/images/newbg/bg3.png')">
        <?php include('navbarfile.php'); ?>
            <div class="forgot_box_internal">
                <p style="color: #b1d34f; text-align: center; font-size: 13px; margin-top: -30px; font-weight: bold;">
                <?php
                    echo $_SESSION['resend_email'];
                    $_SESSION['resend_email']="";
                    unset($_SESSION['resend_email']);
                ?>
                </p>
                <h3>Forgot your password!</h3>
                <div class="login_form">
                    <form action="" method="post" autocomplete="off">
                    <div class="mb-3">
                        <label class="form-label">Enter Your Email <span class="notvalid_email"></span></label>
                        <input type="email" required="required" name="pwa_emailid" id="pwa_emailidresend" class="form-control" placeholder="Enter your email here..." autocomplete="nope">
                    </div>
                    <!-- <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" autocomplete="false" id="exampleInputPassword1" placeholder="Enter your password here...">
                    </div>
                    <div class="mb-3 forgotpass">
                        <p><img src="images/Frame.svg" alt="" style="vertical-align: text-bottom;"> Forgot my password</p>
                    </div> -->
                    <input type="submit" class="pwa_createbtn" id="pwa_createbtnresend" value="Submit" name="pwa_login" style="background: #b1d34f!important;color: #000!important;">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
