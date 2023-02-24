<?php
include('header.php');
?>  
<div class="container">
    <div class="row">
        <div class="welcome_box forgot_box_login welcome_box_login1"  style="background-image:url('https://tro.tentoptoday.com/images/newbg/bg3.png')">
        <?php include('navbarfile.php'); ?>
            <div class="forgot_box_internal">
                <p style="color: #b1d34f; text-align: center; font-size: 13px; margin-top: -30px; font-weight: bold;">
                <?php
                    echo $_SESSION['resend_email'];
                    $_SESSION['resend_email']="";
                    unset($_SESSION['resend_email']);
                    // echo 'SELECT * FROM `pwa_registration` WHERE pwa_email='".$_GET['pwa_emailid']."'';
                       $sql = "SELECT * FROM `pwa_registration` WHERE pwa_email='".$_GET['pwa_emailid']."'";
                       $result = mysqli_query($con, $sql);
                      $result_array=mysqli_fetch_assoc($result);
                       if($_GET['email_token'] == $result_array['email_token']){
                          echo ''; 
                       }else{
                           echo 'Password reset link has been expired,please continue with latest e-mail in your inbox'; die();
                       }
                ?> 
                </p>
                <h3>Reset your password!</h3>
                <div class="login_form">
                    <form action="reset_password_action.php" method="post" autocomplete="off">
                        <input type="hidden" name="usermailid" value="<?php echo $_GET['pwa_emailid'];?>">
                    <div class="mb-3">
                        <label class="form-label">Enter Your New Password<span id="notvalid_reset_password" class="notvalid_pass"></span></label>
                        <div class="cpasswicon"><input type="password" required="required" name="reset_passwordname" id="pwa_password_reset" class="form-control" placeholder="Enter your new password..." autocomplete="nope">
                         <i class="fa fa-fw fa-eye field_icon fa-eye-slash" style="display:none" id="togglePassword4"></i></div>
                    </div>
                    <div class="mb-3">
                       <label class="form-label">Confirm Your Password<span id="notvalid_reset_password_c" class="notvalid_pass"></span></label>
                         <div class="cpasswicon"><input type="password" name="creset_pass" id="pwa_cpassword_reset" class="form-control" autocomplete="false" placeholder="Confirm Your Password...">
                          <i class="fa fa-fw fa-eye field_icon fa-eye-slash" style="display:none" id="togglePassword5"></i></div>
                    </div>
                    <input type="submit" class="pwa_createbtn" id="pwa_resetpassword" value="Submit" name="pwa_reset_submit" style="background: #b1d34f!important;color: #000!important;">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
jQuery(document).ready(function(){
          $('#pwa_password_reset').keyup(function() {
              if($(this).val()=='')
                 $("#togglePassword4").hide();
                else
                $("#togglePassword4").show();
          });
          
          $('#pwa_cpassword_reset').keyup(function() {
              if($(this).val()=='')
                 $("#togglePassword5").hide();
                else
                $("#togglePassword5").show();
          });
 });
    const togglePassword4 = document.querySelector('#togglePassword4');
  const password = document.querySelector('#pwa_password_reset');

  togglePassword4.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
const togglePassword5 = document.querySelector('#togglePassword5');
  const password2 = document.querySelector('#pwa_cpassword_reset');

  togglePassword5.addEventListener('click', function (e) {
    // toggle the type attribute
    const type2 = password2.getAttribute('type') === 'password' ? 'text' : 'password';
    password2.setAttribute('type', type2);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
<?php include('footer.php'); ?>
