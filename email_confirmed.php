<?php
session_start();
include('header.php');

    $sql = "UPDATE `pwa_registration` SET `email_verified`=1 WHERE pwa_email='".$_GET['pwa_emailid']."'";
    $result = mysqli_query($con, $sql);

    if(mysqli_affected_rows($con) >0 ) {
        $_SESSION['email_verified'] = $_GET['pwa_emailid'];
    }
    $sqlId = "SELECT * FROM `pwa_registration` WHERE pwa_email='".$_GET['pwa_emailid']."'";
                       $result = mysqli_query($con, $sqlId);
                      $result_array=mysqli_fetch_assoc($result);
                       if($_GET['email_token'] == $result_array['email_token']){
                          echo ''; 
                          
                       }else{
                           echo 'email verification link has expired, please continue with the latest e-mail in your inbox'; die();
                       }
    // echo $_SESSION['email_verified'];
// include('session_confirm.php');
 ?>  

<div class="container">
    <div class="row">
        <div class="welcome_box email_confirmed_bg">
        <?php include('navbarfile.php'); ?>
            <div class="email_confirmed_internal">
            <p style="text-align: center; color: #b1d34f; font-weight: bold;"><?php echo $update_message; ?></p>
                <h3>Email confirmed</h3>
                <img src="images/email_confirmed.svg" alt="">
                <p>You have successfully verifed your account.<br/>Welcome aboard.</p>
                
                <div class="login_form_2" >
                
                <a href="https://tro.tentoptoday.com/payment_board.php" style="font-size: 14px;
                    font-weight: 600!important;
                    font-family: 'Montserrat', sans-serif;
                    padding: 8px 40px;
                    border-radius: 20px;
                    color: #000;
                    margin: 20px auto 0px;
                   background: rgb(177, 211, 79);width: 50%; text-decoration: none; <?php if(isset($_GET['email_token']) && $_GET['email_token'] != "") { ?> display:none; <?php }else{ ?> display:block; <?php } ?>">Continue</a>
               
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
</script>
<?php include('footer.php'); ?>
