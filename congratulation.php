<?php
include('header.php');

    // $sql = "UPDATE `pwa_registration` SET `pwa_status`=1 WHERE pwa_email='".$_GET['pwa_emailid']."'";
    // $result = mysqli_query($con, $sql);

    // if(mysqli_affected_rows($con) >0 ) {
    //     $update_message = ''
    // } 
// include('session_confirm.php');
 ?>  
<div class="container">
    <div class="row">
        <div class="welcome_box email_confirmed_bg">
        <?php include('navbarfile.php'); ?>
            <div class="email_confirmed_internal congomoboloi">
            <!-- <?php 
		//if(isset($_SESSION["message"]) && $_SESSION["message"] && $_SESSION["message"] == 'failed') {
		?>			
			<div class="alert alert-danger">
			  <?php 
		//	  echo "Error : Payment failed!"; 
		//	  $_SESSION["message"] = '';
			  ?>
			</div>
		<?php 
		//} elseif(isset($_SESSION["message"]) && $_SESSION["message"]) {
		?>
        <div class="alert alert-success">
			  <?php 
		//	  echo $_SESSION["message"]; 
		//	  $_SESSION["message"] = '';
			  ?>
			</div>
		<?php //} ?> -->
        <!-- Session message show -->
            <!-- <p style="text-align: center; color: #b1d34f; font-weight: bold;"><?php echo $update_message; ?></p> -->
                <h5>Thank you!<br> Welcome to ChargeTime!</h5>
                <img src="images/congrats.svg" alt="">
                <p style="margin: 30px 0px 25px;">An electrification specialist will be reaching out to you to schedule the activation/installation of the TRO ES charger.</p>
                <div class="login_form_2">
                    <a href="/dashboard.php"> <img src="images/backtohome.png" alt=""> </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
