<?php
session_start();
if($_SESSION['email_verified']=="") {
	header('location:https://tro.tentoptoday.com');
	exit();
}
include('header.php'); ?>  
<div class="container">
    <div class="row">
        <div class="welcome_box payment_signup_login">
            <div class="payment_navbar">
        <?php include('navbarfile.php'); ?>
            </div>
        <!-- Session message show -->
            <div class="signup_box_internal">
            <!-- <?php 
		if(isset($_SESSION["message"]) && $_SESSION["message"] && $_SESSION["message"] == 'failed') {
		?>			
			<div class="alert alert-danger">
			  <?php 
			  echo "Error : Payment failed!"; 
			  $_SESSION["message"] = '';
			  ?>
			</div>
		<?php 
		} elseif(isset($_SESSION["message"]) && $_SESSION["message"]) {
		?>
        <div class="alert alert-success">
			  <?php 
			  echo $_SESSION["message"]; 
			  $_SESSION["message"] = '';
			  ?>
			</div>
		<?php } ?>
        Session message show -->

        <!-- Form start -->
        <div class="panel-body">
				<form action="process.php" method="POST" id="paymentForm">	
					<div class="row">
					    <?php 
					    $sql_get = mysqli_query($con,"SELECT * FROM `pwa_registration` WHERE pwa_email='".$_SESSION['email_verified']."'");
$result_array=mysqli_fetch_assoc($sql_get);
$sql_get_22 = mysqli_query($con,"SELECT * FROM `locations` WHERE id='".$result_array['pwa_choice']."'");
$result_array_22=mysqli_fetch_assoc($sql_get_22);
?>
						<div class="col-md-12 login_form">
							<h5 style="text-align:center">Payment Summary</h5>
                                                 <table style="width: 100%; margin: 20px 0px 0px;">
                                                        <tr>
                                                               <td style="width: 35%;">Plan:</td>
                                                               <td><?php echo trim($_POST['pwa_option']); ?></td>
                                                        </tr>
                                                        <tr>
                                                               <td>Location:</td>
                                                               <td><?php echo ($result_array_22['location']); ?></td>
                                                        </tr>
                                                        <tr>
                                                               <td>Price:</td>
                                                               <td>$<?php echo trim($_POST['pwa_price_new']); ?></td>
                                                        </tr>
                                                 </table>
                                                 <br/>
							<div class="form-group">
								<label>Card Holder Name <span class="text-danger">*</span></label>
								<input type="text" name="customerName" id="customerName" class="form-control" value="" required="required">
								<span id="errorCustomerName" class="text-danger"></span>
							</div>
							<div class="form-group">
								<label>Email Address <span class="text-danger">*</span></label>
								<input type="text" name="emailAddress" id="emailAddress" class="form-control" value="" required="required">
								<span id="errorEmailAddress" class="text-danger"></span>
							</div>
							<!-- <div class="form-group">
								<label>Address <span class="text-danger">*</span></label>
								<textarea name="customerAddress" id="customerAddress" class="form-control"></textarea>
								<span id="errorCustomerAddress" class="text-danger"></span>
							</div> -->
							<!-- <div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>City <span class="text-danger">*</span></label>
										<input type="text" name="customerCity" id="customerCity" class="form-control" value="" required="required">
										<span id="errorCustomerCity" class="text-danger"></span>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Zip <span class="text-danger">*</span></label>
										<input type="text" name="customerZipcode" id="customerZipcode" class="form-control" value="" required="required">
										<span id="errorCustomerZipcode" class="text-danger"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>State </label>
										<input type="text" name="customerState" id="customerState" class="form-control" value="" required="required">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Country <span class="text-danger">*</span></label>
										<input type="text" name="customerCountry" id="customerCountry" class="form-control" required="required">
										<span id="errorCustomerCountry" class="text-danger"></span>
									</div>
								</div>
							</div> -->
							<hr>
                            <br/>
							<h5>Payment Details</h5><br/>
							<div class="form-group">
								<label>Card Number <span class="text-danger">*</span></label>
								<input type="tel" name="cardNumber" id="cardNumber" class="form-control onlynumberallowe" placeholder="1234 5678 9012 3456" maxlength="16" onkeydown='validate(event)'>
								<span id="errorCardNumber" class="text-danger"></span>
							</div>
							<div class="form-group" style="margin-bottom: 0px;">
								<div class="row">
									<div class="col-md-5 mbmbt">
										<label>Month / Year</label>
										<input type="text" name="cardExpMonth" id="cardExpMonth" class="monthexpiry onlynumberallowe" placeholder="MM" maxlength="2" onkeydown="validateNumber(event);" required="required"> <div class="slashcardd">/</div> <input type="text" name="cardExpYear" id="cardExpYear" class="monthexpiry onlynumberallowe" placeholder="YY" maxlength="2" onkeydown="validateNumber(event);" required="required">
										<span id="errorCardExpMonth" class="text-danger" style="display: inline-block;"></span>
										<span id="errorCardExpYear" class="text-danger" style="display: inline-block;"></span>
									</div>
									
									<div class="col-md-7 mbmbt">
										<label>CVC</label>
										<input type="text" name="cardCVC" id="cardCVC" class="form-control onlynumberallowe" placeholder="123" maxlength="3" onkeypress="return validateNumber(event);" required="required">
										<span id="errorCardCvc" class="text-danger"></span>
									</div>
								</div>
							</div>
							<br>
							<div align="center">
							<!--<input type="hidden" name="price" value="<?php //echo round($_POST['pwa_price'],0)*100; ?>">
							<input type="hidden" name="total_amount" value="<?php //echo round($_POST['pwa_price'],0)*100; ?>">-->
							<input type="hidden" name="price" value="<?php echo $_POST['pwa_price']; ?>">
							<input type="hidden" name="total_amount" value="<?php echo $_POST['pwa_price']; ?>">
							<input type="hidden" name="currency_code" value="USD">
							<input type="hidden" name="item_details" value="<?php echo trim($_POST['pwa_option']); ?>">
							<input type="hidden" name="item_number" value="Energy_<?php echo rand(999,111).time();?>">
							<input type="hidden" name="order_number" value="TRO_<?php echo rand(99,11).time();?>">
                            <span id="invalid_carddetails" class="notvalid_pass"></span>
							<input type="submit" name="payNow" id="payNow" class="pwa_createbtn" style="background: #b1d34f!important; color: #000!important;" onclick="stripePay(event)" value="Pay Now" />
							</div>
							<br>
						</div>
						
					</div>
				</form>
			</div>


            <!-- Form end -->

                    
            </div>
        </div>
    </div>
</div>
<style>
.payment_signup_login {
    width: 400px!important;
    background: #3a72de!important;
}  
.payment_navbar .topbar {
    margin-top: 0px;
    background: #fff;
    padding: 15px 15px 10px;
}
.payment_signup_login .form-group {
    margin-bottom: 20px;
} 
.mbmbt {
    margin-bottom: 20px;
} 
.monthexpiry {
    float: left;
    width: 100%;
    max-width: 60px;
    display: block;
    padding: 0.375rem 0.75rem;
    font-weight: 400;
    line-height: 1.5;
    background-clip: padding-box;
    appearance: none;
    border-radius: unset;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
	outline: unset;
}
.slashcardd {
	float: left;
    font-size: 24px;
    font-weight: 100;
    background: #4e80e1;
}
</style>

<script>
    
  
    
    input_credit_card = function(jQinp)
{
    var format_and_pos = function(input, char, backspace)
    {
        var start = 0;
        var end = 0;
        var pos = 0;
        var value = input.value;

        if (char !== false)
        {
            start = input.selectionStart;
            end = input.selectionEnd;

            if (backspace && start > 0) // handle backspace onkeydown
            {
                start--;

                if (value[start] == " ")
                { start--; }
            }
            // To be able to replace the selection if there is one
            value = value.substring(0, start) + char + value.substring(end);

            pos = start + char.length; // caret position
        }

        var d = 0; // digit count
        var dd = 0; // total
        var gi = 0; // group index
        var newV = "";
        var groups = /^\D*3[47]/.test(value) ? // check for American Express
        [4, 6, 5] : [4, 4, 4, 4];

        for (var i = 0; i < value.length; i++)
        {
            if (/\D/.test(value[i]))
            {
                if (start > i)
                { pos--; }
            }
            else
            {
                if (d === groups[gi])
                {
                    newV += " ";
                    d = 0;
                    gi++;

                    if (start >= i)
                    { pos++; }
                }
                newV += value[i];
                d++;
                dd++;
            }
            if (d === groups[gi] && groups.length === gi + 1) // max length
            { break; }
        }
        input.value = newV;

        if (char !== false)
        { input.setSelectionRange(pos, pos); }
    };

    jQinp.keypress(function(e)
    {
        var code = e.charCode || e.keyCode || e.which;

        // Check for tab and arrow keys (needed in Firefox)
        if (code !== 9 && (code < 37 || code > 40) &&
        // and CTRL+C / CTRL+V
        !(e.ctrlKey && (code === 99 || code === 118)))
        {
            e.preventDefault();

            var char = String.fromCharCode(code);

            // if the character is non-digit
            // -> return false (the character is not inserted)

            if (/\D/.test(char))
            { return false; }

            format_and_pos(this, char);
        }
    }).
    keydown(function(e) // backspace doesn't fire the keypress event
    {
        
     
         format_and_pos(this, false);
        if (e.keyCode === 8 || e.keyCode === 46) // backspace or delete
        {
            e.preventDefault();
            format_and_pos(this, '', this.selectionStart === this.selectionEnd);
        }
    }).
    on('paste', function()
    {
        // A timeout is needed to get the new value pasted
        setTimeout(function()
        { format_and_pos(jQinp[0], ''); }, 50);
    }).
    blur(function() // reformat onblur just in case (optional)
    {
        format_and_pos(this, false);
    });
};

input_credit_card($('#cardNumber'));
</script>
<style>
    .text-danger {

    color: #b1d34f !important;
}
</style>
<?php include('footer.php'); ?>
