
// Stripe.setPublishableKey('pk_live_51LCrEBJPfbfzje02kM4bLe9H6mEIVNkpZwxrcNSNOA8TO0WyfSAcZhjPsCgG7pYuwdE1QjFzmd3bew2A2ch3lqCE00NG2kiGDs');


Stripe.setPublishableKey('pk_test_51LCrEBJPfbfzje02cGGuiKfWFTikU4sHdU7XN13cr0EzRRHRThNfecBFmI9wIzZ3WRaLJbA5IACZ5tU1kO3dpCUw007mxAvgeb');



function stripePay(event) {
    event.preventDefault(); 
    if(validateForm() === true) {
     $('#payNow').attr('disabled', 'disabled');
    //  $('#payNow').val('Payment Processing....');
     Stripe.createToken({
      number:$('#cardNumber').val(),
      cvc:$('#cardCVC').val(),
      exp_month : $('#cardExpMonth').val(),
      exp_year : $('#cardExpYear').val()
     }, stripeResponseHandler);
    //  console.log('card details wrong');
     return false;
     
    }
}

function stripeResponseHandler(status, response) {
 if(response.error) {
  // console.log('card details wrong 2');
  $('#invalid_carddetails').html('Invalid Card Details!');
  $('#payNow').attr('disabled', false);
  $('#message').html(response.error.message).show();
 } else {
  $('#payNow').val('Payment Processing....');
  var stripeToken = response['id'];
  $('#paymentForm').append("<input type='hidden' name='stripeToken' value='" + stripeToken + "' />");

  $('#paymentForm').submit();
 }
}

function validateForm() {
 var validCard = 0;
 var valid = false;
 var cardCVC = $('#cardCVC').val();
 var cardExpMonth = $('#cardExpMonth').val();
 var cardExpYear = $('#cardExpYear').val();
 var cardNumber = $('#cardNumber').val().replace(/ /g,'');
 var emailAddress = $('#emailAddress').val();
 var customerName = $('#customerName').val();
//  var customerAddress = $('#customerAddress').val();
//  var customerCity = $('#customerCity').val();
//  var customerZipcode = $('#customerZipcode').val();
//  var customerCountry = $('#customerCountry').val();
 var validateName = /^[a-z ,.'-]+$/i;
//  var validateEmail = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/;
 var validateEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
 var validateMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
 var validateYear = /^22|23|24|25|26|27|28|29|30|31$/;
 
 var cvv_expression = /^[0-9]{3,3}$/;

 $('#cardNumber').validateCreditCard(function(result){
    
  if(result.valid) {
   $('#cardNumber').removeClass('require');
   $('#errorCardNumber').text('');
   validCard = 1;
  } else {
   $('#cardNumber').addClass('require');
   $('#errorCardNumber').text('Invalid Card Number');
   validCard = 0;
  }
 });

 if(validCard == 1) {
  if(!validateMonth.test(cardExpMonth)){
   $('#cardExpMcardExpYearonth').addClass('require');
   $('#errorCardExpMonth').text('Invalid Data');
   valid = false;
  } else { 
   $('#cardExpMonth').removeClass('require');
   $('#errorCardExpMonth').text('');
   valid = true;
  }

var d = new Date();
var n = d.getFullYear();

var currentyear = n.toString().substring(2);


if(parseInt(cardExpYear)<currentyear)
{
   
    $('#cardExpYear').addClass('require');
   $('#errorCardExpYear').text('Invalid Year');
   valid = false;
}
else
{
     $('#cardExpYear').removeClass('require');
      $('#errorCardExpYear').text(''); 
      valid = true;
}

//   if(!validateYear.test(cardExpYear)){
//   $('#cardExpYear').addClass('require');
//   $('#errorCardExpYear').error('Invalid Year');
//   valid = false;
//   } else {
      

//   $('#cardExpYear').removeClass('require');
//   $('#errorCardExpYear').error('');
//   valid = true;
//   }

  if(!cvv_expression.test(cardCVC)) {
   $('#cardCVC').addClass('require');
   $('#errorCardCvc').text('Invalid Data');
   valid = false;
  } else {
   $('#cardCVC').removeClass('require');
   $('#errorCardCvc').text('');
   valid = true;
  }
  
  if(!validateName.test(customerName)) {
   $('#customerName').addClass('require');
   $('#errorCustomerName').text('Invalid Name');
   valid = false;
  } else {
   $('#customerName').removeClass('require');
   $('#errorCustomerName').text('');
   valid = true;
  }

  if(!validateEmail.test(emailAddress)) {
   $('#emailAddress').addClass('require');
   $('#errorEmailAddress').text('Invalid Email Address');
   valid = false;
  } else {
   $('#emailAddress').removeClass('require');
   $('#errorEmailAddress').text('');
   valid = true;
  }

//   if(customerAddress == '') {
//    $('#customerAddress').addClass('require');
//    $('#errorCustomerAddress').text('Enter Address Detail');
//    valid = false;
//   } else {
//    $('#customerAddress').removeClass('require');
//    $('#errorCustomerAddress').text('');
//    valid = true;
//   }

//   if(customerCity == ''){
//    $('#customerCity').addClass('require');
//    $('#errorCustomerCity').text('Enter City');
//    valid = false;
//   } else {
//    $('#customerCity').removeClass('require');
//    $('#errorCustomerCity').text('');
//    valid = true;
//   }

//   if(customerZipcode == ''){
//    $('#customerZipcode').addClass('require');
//    $('#errorCustomerZipcode').text('Enter Zip code');
//    valid = false;
//   } else {
//    $('#customerZipcode').removeClass('require');
//    $('#errorCustomerZipcode').text('');
//    valid = true;
//   }

//   if(customerCountry == '') {
//    $('#customerCountry').addClass('require');
//    $('#errorCustomerCountry').text('Enter Country Detail');
//    valid = false;
//   } else {
//    $('#customerCountry').removeClass('require');
//    $('#errorCustomerCountry').text('');
//    valid = true;
//   }  
 }
 return valid;
}

// function validateNumber(event) {

//  var charCode = (event.which) ? event.which : event.keyCode;

//  if (charCode != 32 && charCode > 31 && (charCode < 48 || charCode > 57)){
//   return false;
//  }
//  return true;
// }

$(document).ready(function(){
    // alert('hello11');
// $('#cardExpMonth').keydown(function(evt){
    $(".onlynumberallowe").on("input", function(evt) {
    var self = $(this);
    self.val(self.val().replace(/\D/g, ""));
    if ((evt.which < 48 || evt.which > 57)) 
     {
	   evt.preventDefault();
     }
});
});