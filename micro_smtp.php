<?php
include('session_confirm.php');
include('header.php'); ?>  
<div class="container">
    <div class="row">
        <div class="welcome_box welcome_signup_login">
        <?php include('navbarfile.php'); ?>
            <div class="signup_box_internal">
                <h3>Sign Up</h3>
                <p style="text-align: center; color: #a8cf38; font-weight: bold;margin: -5px;"><?php echo $_SESSION['email_used']; $_SESSION['email_used'] = ''; ?></p>
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
                        <input type="password" class="form-control" name="pwa_password" id="pwa_password" autocomplete="false" placeholder="Create a strong password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password <span id="signup_cpass" class="notvalid_pass"></span></label>
                        <input type="password" class="form-control" name="pwa_cpassword" id="pwa_cpassword" autocomplete="false"  placeholder="Retype the password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number <span id="signup_phone" class="notvalid_pass"></span></label>
                        <input type="text" class="form-control" name="pwa_mobile" id="pwa_mobile" maxlength="10" placeholder="Eg. 99xxxxxxxxx">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Select installation from choices <span id="signup_choice" class="notvalid_pass"></span></label>
                        <select class="form-control selectinput" name="pwa_choices" id="pwa_choices">
                            <!-- <option value="">Select...</option> -->
                            <option value="Vandenberg Space Force Base">Vandenberg Space Force Base</option>
                            <option value="Submarine Base New London">Submarine Base New London</option>
                             <option value="Hill Air Force Base">Hill Air Force Base</option>
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
                                <input type="text" class="form-control" name="pwa_zipcode" id="pwa_zipcode" value="93437" placeholder="Eg. 110000">
                                
                                </div>
                            </div>
                            <div class="col-6" style="padding-right: 0px;">
                                <label class="form-label">State <span id="signup_state" class="notvalid_pass"></span></label>
                                <input type="text" class="form-control" name="pwa_state" value="California" id="pwa_state" placeholder="CA">
                            </div>
                        </div>
                    </div><br/>
                    <input type="submit" class="pwa_createbtn" id="pwa_createbtnsign" value="Create Account" name="pwa_createbtn" style="background: #b1d34f!important;color: #000!important;">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
