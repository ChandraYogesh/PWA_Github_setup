<?php
include('session_confirm.php');
include('header.php'); 
// echo $_SERVER['REMOTE_ADDR'];

?>  
<div class="container">
    <div class="row">
        <div class="welcome_box welcome_signup_login">
        <?php include('navbarfile.php'); ?>
            <div class="signup_box_internal">
                <h3>Sign Up</h3>
                <p style="text-align: center; color: #a8cf38; font-weight: bold;margin: -5px;">
                    <?php if(isset($_SESSION['email_used'])) { ?> <?php echo 'Email id is already used!<a href="https://tro.tentoptoday.com/login.php" style=" text-decoration:auto; text-align: center; color: #a8cf38; font-weight: bold;margin: 3px;">login ? </a>'; unset($_SESSION['email_used']);  } ?></p>
                <div class="login_form">
                    <form action="pwa_registratoin.php" id="pwa_registratoin" method="post" autocomplete="off">
                    <div class="mb-3">
                        <label class="form-label">Full Name <span id="signup_fname" class="notvalid_pass"></span></label>
                        <input type="text" class="form-control" name="pwa_name" id="pwa_name" placeholder="Eg. John Doe" required="required">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email <span id="signup_email" class="notvalid_pass"></span></label>
                        <input type="email" class="form-control" name="pwa_email" id="pwa_email" placeholder="Eg. john@xyz.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password <span id="signup_pass" class="notvalid_pass"></span></label>
                        <div class="Icon"><input type="password" class="form-control" name="pwa_password" id="pwa_password" autocomplete="false" placeholder="Create a strong password">
                        <i class="fa fa-fw fa-eye field_icon fa-eye-slash" style="display:none" id="togglePassword"></i></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password <span id="signup_cpass" class="notvalid_pass"></span></label>
                        <div class="Icon"><input type="password" class="form-control" name="pwa_cpassword" id="pwa_cpassword" autocomplete="false"  placeholder="Retype the password">
                        <i class="fa fa-fw fa-eye field_icon fa-eye-slash" style="display:none" id="togglePassword3"></i></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number <span id="signup_phone" class="notvalid_pass"></span></label>
                        <input type="tel" class="form-control" name="pwa_mobile" id="pwa_mobile" maxlength="10" placeholder="Eg. 99xxxxxxxxx" onkeyup="numberonly(this)">
                    </div>
                    <div class="mb-3">
                    <?php 
                        $sql_location = mysqli_query($con,"SELECT * FROM `locations`");
                        $result_array = mysqli_fetch_assoc($sql_location);
                    ?>
                        <label class="form-label">Select installation from choices <span id="signup_choice" class="notvalid_pass"></span></label>
                        <select class="form-control selectinput" name="pwa_choices" id="pwa_choices">
                            <?php
                            $sql_get = mysqli_query($con,"SELECT * FROM `locations` ORDER BY `id` ASC");
                            while($location_array=mysqli_fetch_assoc($sql_get)) {
                            ?>
                            <option value="<?php echo $location_array['id'];?>"><?php echo $location_array['location'];?></option>
                            <?php } ?>
                            <!-- <option value="Submarine Base New London">Submarine Base New London</option>
                             <option value="Hill Air Force Base">Hill Air Force Base</option> -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address Line 1 <span id="signup_address1" class="notvalid_pass"></span></label>
                        <input type="text" class="form-control" name="pwa_address1" id="pwa_address1" placeholder="Apartment, Street Number, Block...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address Line 2 <span id="signup_address2" class="notvalid_pass"></span></label>
                        <input type="text" class="form-control" name="pwa_address2" id="pwa_address2" placeholder="Apartment, Street Number, Block...">
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                
                                <label class="form-label">Zip Code <span id="signup_zipcode" class="notvalid_pass"></span></label>
                                <?php $sql_get_zip = mysqli_fetch_array(mysqli_query($con,"SELECT `ZIP_code`,`state` FROM `locations` ORDER BY `id` ASC")); ?>
                                <input type="text" class="form-control" name="pwa_zipcode" readonly value="<?php echo $sql_get_zip['ZIP_code'];?>" id="pwa_zipcode" placeholder="Eg. 110000">
                                
                                </div>
                            </div>
                            <div class="col-6" style="padding-right: 0px;">
                                <label class="form-label">State <span id="signup_state" class="notvalid_pass"></span></label>
                                <input type="text" class="form-control" name="pwa_state" readonly value="<?php echo $sql_get_zip['state'];?>" id="pwa_state" placeholder="CA">
                            </div>
                             <input type="hidden" name="email_token" >
                        </div>
                    </div><br/>
                    <input type="submit" class="pwa_createbtn" id="pwa_createbtnsign" value="Create Account" name="pwa_createbtn" style="background: #b1d34f!important;color: #000!important;">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
 jQuery(document).ready(function(){
          $('#pwa_password').keyup(function() {
              if($(this).val()=='')
                 $("#togglePassword").hide();
                else
                $("#togglePassword").show();
          });
          
          $('#pwa_cpassword').keyup(function() {
              if($(this).val()=='')
                 $("#togglePassword3").hide();
                else
                $("#togglePassword3").show();
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


    const togglePassword3 = document.querySelector('#togglePassword3');
    const password2 = document.querySelector('#pwa_cpassword');

  togglePassword3.addEventListener('click', function (e) {
    // toggle the type attribute
    const type2 = password2.getAttribute('type') === 'password' ? 'text' : 'password';
    password2.setAttribute('type', type2);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
   function numberonly(input){
     
       var num= /[^0-9]/g;
       input.value=input.value.replace(num,"");
 }
 
</script>
<?php include('footer.php'); ?>
