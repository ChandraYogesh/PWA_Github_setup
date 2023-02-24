<?php
include('header.php');

$sql_get = mysqli_query($con,"SELECT * FROM `pwa_registration` WHERE pwa_email='".$_SESSION['email_verified']."' ORDER BY `id` ASC");
$result_array=mysqli_fetch_assoc($sql_get);

// echo '<pre>';
// print_r($result_array);
// die();

?>

<div class="container">
    <div class="row">
        <div class="welcome_box welcome_signup_login">
        <?php include('navbarfile.php'); ?>
            <div class="signup_box_internal">
                <h3>Account</h3>
                <p style="text-align: center; color: #a8cf38; font-weight: bold;margin: -5px;"><?php echo $_SESSION['aacount_updatee']; $_SESSION['aacount_updatee']= ''; ?></p>
                <div class="login_form">
                    <form action="pwa_updateprofile.php" id="pwa_registratoin" method="post" autocomplete="off">
                    <div class="mb-3">
                    <label class="form-label">Full Name <span id="signup_fname" class="notvalid_pass"></span></label>
                        <input type="text" class="form-control" name="pwa_name" id="pwa_name" placeholder="Eg. John Doe" required="required" value="<?php echo $result_array['pwa_name']; ?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Email <span id="signup_email" class="notvalid_pass"></span></label>
                        <p><?php echo $result_array['pwa_email']; ?></p>
                    </div>
                    <div class="container">
                        <div class="row">
                            <?php 
                            if($_SESSION['old_pas_notmatch']!="") {
                                echo '<p style="margin: 0 0 2px 0;padding: 0; color: #a8cf38;">'.$_SESSION['old_pas_notmatch'].'</p>';
                                $_SESSION['old_pas_notmatch']='';
                            }    
                            ?>
                            <div class="col-6">
                                <div class="row">
                                <input type="hidden"  name="uold_pass" id="uold_pass">
                                <label class="form-label" style="padding-left: 0;">Current Password <span id="pwa_old_password" class="notvalid_pass"></span></label>
                                <input type="password" class="form-control" name="pwa_old_passwordvalue" id="pwa_old_passwordvalue" autocomplete="false" placeholder="Enter old password" value="<?php echo $result_array['pwa_password'];?>">
                                
                                </div>
                            </div>
                            <div class="col-6" style="padding-right: 0px;">
                            <div class="cpasswicon"><label class="form-label">New Password <span id="signup_pass" class="notvalid_pass"></span></label>
                             <i class="fa fa-fw fa-eye field_icon fa-eye-slash" style="display:none" id="togglePassw"></i></div>
                            <input type="password" class="form-control" name="pwa_password" id="pwa_password" autocomplete="false" placeholder="Create a strong password" value="">
                            </div>
                        </div>
                    </div><br/>
                    <div class="mb-3">
                    <div class="cpasswicon"><label class="form-label">Confirm Password <span id="signup_cpass" class="notvalid_pass"></span></label>
                    <i class="fa fa-fw fa-eye field_icon fa-eye-slash" style="display:none" id="togglePassword2"></i></div>
                        <input type="password" class="form-control" name="pwa_cpassword" id="pwa_cpassword" autocomplete="false"  placeholder="Retype the password" value="">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Phone Number <span id="signup_phone" class="notvalid_pass"></span></label>
                        <input type="tel" class="form-control" name="pwa_mobile" id="pwa_mobile" maxlength="10" placeholder="Eg. 99xxxxxxxxx"  value="<?php echo $result_array['pwa_mobile']; ?>" onkeyup="numberonly(this)">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Select installation from choices <span id="signup_choice" class="notvalid_pass"></span></label>
                        <select class="form-control selectinput" name="pwa_choices" id="pwa_choices">
                            <?php
                            $sql_get_location = mysqli_query($con,"SELECT * FROM `locations` ORDER BY `id` ASC");
                            while($location_arrayy=mysqli_fetch_assoc($sql_get_location)) { 
                            ?>
                            <option value="<?php echo $location_arrayy['id'];?>" <?php echo ($result_array['pwa_choice']==$location_arrayy['id']) ? 'selected' : '' ?>> <?php echo $location_arrayy['location']; ?>
                            </option>
                            <?php } ?>
                            <!-- <option value="Submarine Base New London" <?php //echo ($result_array['pwa_choice']=='Submarine Base New London') ? 'selected' : '' ?>>Submarine Base New London</option>
                             <option value="Hill Air Force Base" <?php //echo ($result_array['pwa_choice']=='Hill Air Force Base') ? 'selected' : '' ?>>Hill Air Force Base</option> -->
                        </select>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Address Line 1 <span id="signup_address1" class="notvalid_pass"></span></label>
                        <input type="text" class="form-control" name="pwa_address1" id="pwa_address1" placeholder="Apartment, Street Number, Block..." value="<?php echo $result_array['pwa_add1']; ?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Address Line 2 <span id="signup_address2" class="notvalid_pass"></span></label>
                        <input type="text" class="form-control" name="pwa_address2" id="pwa_address2" placeholder="Apartment, Street Number, Block..." value="<?php echo $result_array['pwa_add2']; ?>">
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                
                                <label class="form-label">Zip Code <span id="signup_zipcode" class="notvalid_pass"></span></label>
                                <input type="text" class="form-control" name="pwa_zipcode" id="pwa_zipcode" readonly placeholder="Eg. 110000" value="<?php echo $result_array['pwa_zip']; ?>">
                                
                                </div>
                            </div>
                            <div class="col-6" style="padding-right: 0px;">
                            <label class="form-label">State <span id="signup_state" class="notvalid_pass"></span></label>
                                <input type="text" class="form-control" name="pwa_state" id="pwa_state" readonly placeholder="CA" value="<?php echo $result_array['pwa_state']; ?>">
                            </div>
                        </div>
                    </div><br/>
                    <input type="submit" class="pwa_createbtn" value="Update" id="pwa_updatebtnsign" name="pwa_updatebtn" style="background: #b1d34f!important;color: #000!important;">
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
                 $("#togglePassw").hide();
                else
                $("#togglePassw").show();
          });
          
          $('#pwa_cpassword').keyup(function() {
              if($(this).val()=='')
                 $("#togglePassword2").hide();
                else
                $("#togglePassword2").show();
          });
 });
    
       const togglePassword = document.querySelector('#togglePassw');
  const password = document.querySelector('#pwa_password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});

 const togglePassword2 = document.querySelector('#togglePassword2');
    const password2 = document.querySelector('#pwa_cpassword');

  togglePassword2.addEventListener('click', function (e) {
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
