<?php include('header.php');
$chmail = $_SESSION['email_verify'];
$sql_check_mail_status = "SELECT id FROM `pwa_registration` WHERE pwa_email='".$chmail."' and email_verified=1";
$result = mysqli_query($con, $sql_check_mail_status);
if (mysqli_num_rows($result) > 0) {
    $_SESSION['email_verified'] = $chmail;    
?>
<script>
window.location.replace("https://tro.tentoptoday.com/email_confirmed.php");    
</script>
<?php } ?>
<script>
const interval = setInterval(function() {
    window.location.reload();
 }, 3000);

// document.write(new Date());
</script>  
<div class="container">
    <div class="row">
        <div class="welcome_box email_verify_box">
            <?php include('navbarfile.php'); ?>
            <div class="verify_box_internal">
            <p style="color: #b1d34f; text-align: center; font-size: 14px; margin-top: -30px;font-weight: bold;"><?php echo $_SESSION['resend_email'];
            $_SESSION['resend_email']=""; unset($_SESSION['resend_email']);?></p>
                <h3>Verify your email</h3>
                <div class="verify_boxstart">
                    <img src="images/verify_eamil.svg" alt="">    
                    <div class="gapbet"></div>
                    <h4>Confirm your email address</h4>

                    <p>We have sent a confirmation email  to:<br/><b><?php echo $_SESSION['email_verify']; ?></b></p>
                    <p>Check your inbox or spam folder as well and click on the<br/>“Verify Email Adress” button to confirm<br/>your account.</p>

                    <!-- <p class="notice_para">Entered wrong email? Go back to make changes.<br/>Entered correct email but didn’t recieve any email?</p> -->
                    <form name="resend_email" method="post" enctype="multipart/form-data" action="email_verify_action.php">
                        <input type="hidden" value="<?php echo $_SESSION['email_verify']; ?>" name="resend_emailvalue">
                    
                    <input type="submit" class="pwa_createbtn" value="Resend Email" name="pwa_createbtn" style="background: #b1d34f!important;color: #000!important;    border: none;font-size:14px">
                    
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
