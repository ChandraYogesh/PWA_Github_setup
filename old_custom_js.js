$(document).ready(function() {
    // on click
    $('.backbtn').click(function(e){
      // prevent default behavior
      e.preventDefault();
      // Go back 1 page 
      window.history.back();
      // can also use 
      // window.history.go(-1);
    });

// Get value from stripe 

var use_palnch = $('#user_planchoice').val();
if(use_palnch=='Hill Air Force Base') {
  var stripe_pr_id = 'prod_MWRzDuxNnEi77U';
} else if(use_palnch=='Vandenberg Space Force Base') {
  var stripe_pr_id = 'prod_MWRpo2WtycSX2i';
} else {
  var stripe_pr_id = 'prod_MWRnsyF8GOst7n';
}
    $.ajax
      ({ 
          url: 'stripe_product_details.php',
          data: {"product_idd": stripe_pr_id},
          type: 'post',
          success: function(result)
          {
            result = JSON.parse(result);
            // console.log(result.Package_Price);
            var tro_prname = result.name
            var tro_price = result.metadata.Package_Price
            $('.pr_orginal_name').html(tro_prname);
            $('.pr_orginal_price').html(tro_price);
            $('#selected_planoption').val(tro_prname);
              $('#selected_planprice').val(tro_price);

          }
      });


      $(".spricec").click(function(){
        var stripe_prid=jQuery(this).attr('data-prid');  
        // alert(stripe_prid);       
        $.ajax
        ({ 
            url: 'stripe_product_details.php',
            data: {"product_idd": stripe_prid},
            type: 'post',
            success: function(result)
            {
              result = JSON.parse(result);
              // console.log(result.Package_Price);
              var tro_prname = result.name
              var tro_price = result.metadata.Package_Price
              $('.pr_orginal_name').html(tro_prname);
            $('.pr_orginal_price').html(tro_price);
            $('#selected_planoption').val(tro_prname);
              $('#selected_planprice').val(tro_price);
            }
        });
        
    });
      
      


// Get value from stripe    

$('.spricec').click(function(){
  
  var plan_price = $(this).attr("data-price");
  var plan_option = $(this).attr("data-option");
  $('#selected_planprice').val(plan_price);
  $('#selected_planoption').val(plan_option);
});

// next field jump
$('#cardExpMonth').keyup(function () {
  if (this.value.length == this.maxLength) {
  $('#cardExpYear').focus();
}
});
// $('#cardExpYear').keyup(function () {
//   if (this.value.length == this.maxLength) {
//   $('#cardExpYear').focus();
// }
// });
// next field jump

});    
function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}


// custome validation vikram
$(document).ready(function() {
  // space not allowed
  $('#pwa_password,#pwa_cpassword,#pwa_email,#pwa_old_passwordvalue').on('keypress', function(e) {
    if (e.which == 32){
        console.log('Space Detected');
        return false;
    }
  });

  $('#pwa_mobile,#pwa_zipcode').keypress(function (e) {
    var charCode = (e.which) ? e.which : e.keyCode    
    if (String.fromCharCode(charCode).match(/[^0-9]/g))    
        return false;
}); 

$( "#pwa_state" ).keypress(function(e) {
  var key = e.keyCode;
  if (key >= 48 && key <= 57) {
      e.preventDefault();
  }
});


  // Login page validation
  $('#pwa_createbtnbtn').click(function() {
    // Email validation
      var userinput = $('#pwa_email').val();
      var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(userinput)) {
    $('.notvalid_email').html('| Please enter a valid email!');
    $('#pwa_email').focus();
    return false;
  }
  // End Email validation
  // Password validation
  var pass_lenght = $('#pwa_password').val().length;
  if(pass_lenght < 8) {
    $('.notvalid_pass').html('| Min 8 character!');
    $('#pwa_password').focus();
    return false;
  }     
  // End Password validation
  });

  // Forgot mail validation
  $('#pwa_createbtnresend').click(function() {
    var userinput = $('#pwa_emailidresend').val();
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(userinput)) {
      $('.notvalid_email').html('| Please enter a valid email!');
      $('#pwa_emailidresend').focus();
      return false;
    }
  });
  // End Forgot mail validation

  // Sign up validation

  $('#pwa_createbtnsign').click(function() {
    var sign_name = $('#pwa_name').val().length;
    if(sign_name < 2) {
      $('#signup_fname').html('| Min 2 letter!');
      $('#pwa_name').focus();
      return false;
    } else {
      $('#signup_fname').html('');
    }

    var userinput = $('#pwa_email').val();
      var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(userinput)) {
      $('#signup_email').html('| Please enter a valid email!');
      $('#pwa_email').focus();
      return false;
    } else {
      $('#signup_email').html('');
    }

    var spassword = $('#pwa_password').val().length;
    if(spassword < 8) {
      $('#signup_pass').html('| Min 8 character!');
      $('#pwa_password').focus();
      return false;
    } else {
      $('#signup_pass').html('');
    }
    var scpassword = $('#pwa_cpassword').val().length;
    if(scpassword < 8) {
      $('#signup_cpass').html('| Min 8 character!');
      $('#pwa_cpassword').focus();
      return false;
    } else {
      $('#signup_cpass').html('');
    }
    var pw1 = $('#pwa_password').val();  
    var pw2 = $('#pwa_cpassword').val();  
    if(pw1 != pw2) {   
      $('#signup_cpass').html('| Password do not match!');
      $('#pwa_cpassword').focus();
      return false;  
    }  

    var sphone = $('#pwa_mobile').val().length;
    if(sphone < 10) {
      $('#signup_phone').html('| Min 10 character!');
      $('#pwa_mobile').focus();
      return false;
    } else {
      $('#signup_phone').html('');
    }

    var saddress = $('#pwa_address1').val().length;
    if(saddress < 5) {
      $('#signup_address1').html('| Min 5 letter!');
      $('#pwa_address1').focus();
      return false;
    } else {
      $('#signup_address1').html('');
    }
    // var saddress2 = $('#pwa_address2').val().length;
    // if(saddress2 < 5) {
    //   $('#signup_address2').html('| Address must be 5 words!');
    //   $('#pwa_address2').focus();
    //   return false;
    // } else {
    //   $('#signup_address2').html('');
    // }
    var szipcode = $('#pwa_zipcode').val().length;
    if(szipcode < 2) {
      $('#signup_zipcode').html('| Invalid!');
      $('#pwa_zipcode').focus();
      return false;
    } else {
      $('#signup_zipcode').html('');
    }
    var sstate = $('#pwa_state').val().length;
    if(sstate < 2) {
      $('#signup_state').html('| Invalid!');
      $('#pwa_state').focus();
      return false;
    } else {
      $('#signup_state').html('');
    }

  });

  // End Sign up validation


  // account validation

  $('#pwa_updatebtnsign').click(function() {
    var sign_name = $('#pwa_name').val().length;
    if(sign_name < 2) {
      $('#signup_fname').html('| Min 2 words required!');
      $('#pwa_name').focus();
      return false;
    } else {
      $('#signup_fname').html('');
    }
    var spassword = $('#pwa_password').val().length;
    if(spassword < 8) {
      $('#signup_pass').html('| Min 8 character!');
      $('#pwa_password').focus();
      return false;
    } else {
      $('#signup_pass').html('');
    }
    var scpassword = $('#pwa_cpassword').val().length;
    if(scpassword < 8) {
      $('#signup_cpass').html('| Min 8 character!');
      $('#pwa_cpassword').focus();
      return false;
    } else {
      $('#signup_cpass').html('');
    }
    var pw1 = $('#pwa_password').val();  
    var pw2 = $('#pwa_cpassword').val();  
    if(pw1 != pw2) {   
      $('#signup_cpass').html('| Password not match!');
      $('#pwa_cpassword').focus();
      return false;  
    }  

    var sphone = $('#pwa_mobile').val().length;
    if(sphone < 10) {
      $('#signup_phone').html('| Min 10 character!');
      $('#pwa_mobile').focus();
      return false;
    } else {
      $('#signup_phone').html('');
    }

    var saddress = $('#pwa_address1').val().length;
    if(saddress < 5) {
      $('#signup_address1').html('| Address must be 5 words!');
      $('#pwa_address1').focus();
      return false;
    } else {
      $('#signup_address1').html('');
    }
    // var saddress2 = $('#pwa_address2').val().length;
    // if(saddress2 < 5) {
    //   $('#signup_address2').html('| Address must be 5 words!');
    //   $('#pwa_address2').focus();
    //   return false;
    // } else {
    //   $('#signup_address2').html('');
    // }
    var szipcode = $('#pwa_zipcode').val().length;
    if(szipcode < 2) {
      $('#signup_zipcode').html('| Min 2 number!');
      $('#pwa_zipcode').focus();
      return false;
    } else {
      $('#signup_zipcode').html('');
    }
    var sstate = $('#pwa_state').val().length;
    if(sstate < 2) {
      $('#signup_state').html('| Min 2 words!');
      $('#pwa_state').focus();
      return false;
    } else {
      $('#signup_state').html('');
    }

  });

  // end account validation 

// old password check
// $("#pwa_old_passwordvalue").keyup(function(){
//   var oldpassword = $(this).val().trim();
//   if(oldpassword != ''){
//      $.ajax({
//         url: 'oldpasswordajax.php',
//         type: 'post',
//         data: {oldpassword: oldpassword},
//         // success: function(response){
//         //     $('#pwa_old_password').html(response);
//         //  }
//         success:function()
//              {                 
//                alert("Success");
//              }
//      });
//   }else{
//      $("#pwa_old_password").html("");
//   }

// });
// end old password check

$('#pwa_choices').on('change', function() {
  var choicevalue = $(this).val();
  // alert(choicevalue);
  if(choicevalue=='Vandenberg Space Force Base') {
    $('#pwa_zipcode').val('93437');
    $('#pwa_state').val('California');
  } else if(choicevalue=='Submarine Base New London') {
    $('#pwa_zipcode').val('06349');
    $('#pwa_state').val('Connecticut');

  } else if(choicevalue=='Hill Air Force Base') {
    $('#pwa_zipcode').val('84056');
    $('#pwa_state').val('Utah');

  }
});

});

// custom validation vikram
