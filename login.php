<?php
include('session_confirm.php');
include('header.php'); ?>
<style>
    .show{
        display:block;
    }
    .hide{
        display:none;
    }
</style>
<div class="container">
     <!--<div id="pageloader">-->
     <!--<img src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif" alt="processing..." />-->
     <!--   </div>-->
    <div class="row">
        <div class="welcome_box welcome_box_login1" style="background-image:url('https://tro.tentoptoday.com/images/newbg/bg3.png')">
        <?php include('navbarfile.php'); ?>
            <div class="login_box_internal">
            <p style="color: #b1d34f; text-align: center; font-size: 14px; margin-top: -30px;font-weight: bold;"><?php echo $_SESSION['detail_wrong'];
                $_SESSION['detail_wrong']="";
                unset($_SESSION['detail_wrong']);
                
                echo $_SESSION['resend_email'];
                $_SESSION['resend_email']="";
                unset($_SESSION['resend_email']);
                
                
                ?></p>
                <p style="color: #b1d34f; text-align: center; font-size: 14px; margin-top: -30px;font-weight: bold;"><?php echo $_SESSION['password_reset'];
                $_SESSION['password_reset']="";
                unset($_SESSION['password_reset']);
                ?></p>
                <h3 style="padding-top: 50px;">Log In</h3>
                <div class="login_form">
                    <form action="https://tro.tentoptoday.com/pwa_logincheck.php" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Email <span class="notvalid_email"></span></label>
                        <input type="email" name="pwa_email" id="pwa_email" class="form-control input" placeholder="Enter your email here..." autocomplete="nope" required="required">
                        <!--<span id="msg" style="display:none"></span>-->
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password <span class="notvalid_pass"></span></label>
                       <div class="Icon"><input type="password" name="pwa_password" id="pwa_password" class="form-control" minlength="8" autocomplete="false" placeholder="Enter your password here..." required="required">
                        <i class="fa fa-fw fa-eye field_icon fa-eye-slash" style="display:none" id="togglePassword"></i></div>
                    </div>
                    <div class="mb-3 forgotpass">
                        <p><a href="/forgot.php" style="color: #fff;text-decoration: none;"><img src="images/Frame.svg" alt="" style="vertical-align: text-bottom;"> Forgot my password</a></p>
                    </div>
                    <input type="submit" class="pwa_createbtn button" id="pwa_createbtnbtn" value="Login" name="pwa_login" style="background: #b1d34f!important;color: #000!important;" >
                    <input type="hidden" name="email_token" value="12345">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
 jQuery(document).ready(function(){
      jQuery("#pwa_email").focusout(function(){

           jQuery('.login_form').animate({scrollTop:-200},500);
    });
  $('#pwa_password').keyup(function() {
               if($(this).val()=='')
                 $("#togglePassword").hide();
                else
                $("#togglePassword").show();
          });
 });
 
let input = document.querySelector("#pwa_email");
let button = document.querySelector("#pwa_createbtnbtn");

button.disabled = true
input.addEventListener("change", stateHandle);

function stateHandle() {
    if (document.querySelector("#pwa_email").val!== "") {
        button.disabled = false; //button remains disabled
    } else {
        button.enabled = true; //button is enabled
    }
}

$("#pwa_email").on('focusout',function(){
    // $("#pwa_email").attr("disabled", true);
  //  $("#pwa_email").attr("disabled", true);
  var email_id = $("#pwa_email").val();
//   alert(email_id);
    $.ajax({
      url: 'https://tro.tentoptoday.com/logincheck.php',
      data: { email_ids: email_id },
      type: 'post',
      success: function(response){
        //success process here   
        console.log(response);
        if(response.status == 1){
             $("#pwa_createbtnbtn").prop("disabled", false);
        }else{
             $("#pwa_createbtnbtn").prop("disabled", true);
             $(".notvalid_email").html("Please Enter a valid email"); //also show a success message 
            //  $("#msg").html();
             
        }
      }
    });    
});

const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#pwa_password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
    
</script>

<?php include('footer.php'); ?>
