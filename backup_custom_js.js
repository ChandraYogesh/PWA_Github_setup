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


// Form Validation

$("#pwa_registratoin").validate({
  // error postion change
  errorPlacement: function( error, element ) {
    // attrib nameof the field
    var n = element.attr("name");
    if (n == "pwa_name")
    element.attr("placeholder", "Please enter full name");
    else if (n == "pwa_email")
    element.attr("placeholder", "Please enter email");
    else if (n == "pwa_password")
    element.attr("placeholder", "Please password");
    else if (n == "pwa_cpassword")
    element.attr("placeholder", "Please type same password");
    else if (n == "pwa_mobile")
    element.attr("placeholder", "Please enter mobile");
    // else if (n == "pwa_choices")
    // element.attr("placeholder", "Select Choice");
    // else if (n == "pwa_email")
    // element.attr("placeholder", "Please enter email");
    // else if (n == "pwa_email")
    // element.attr("placeholder", "Please enter email");
    // else if (n == "pwa_email")
    // element.attr("placeholder", "Please enter email");
    // else if (n == "pwa_email")
    // element.attr("placeholder", "Please enter email");
    },
  // in 'rules' user have to specify all the constraints for respective fields
  rules: {
    pwa_name: "required",
    pwa_email: {
      required: true,
      email: true
    },
    pwa_password: {
          required: true,
          minlength: 3
      },
    pwa_cpassword: {
          required: true,
          minlength: 3,
          equalTo: "#pwa_password" //for checking both passwords are same or not
      },
    pwa_mobile: "required",
    // pwa_choices: "required",
    // pwa_address1: "required",
    // pwa_address2: "required",
    // pwa_zipcode: "required",
    // pwa_state: "required",
  },
  // in 'messages' user have to specify message as per rules
  // messages: {
  //     firstname: " Please enter your firstname",
  //     lastname: " Please enter your lastname",
  //     username: {
  //         required: " Please enter a username",
  //         minlength: " Your username must consist of at least 2 characters"
  //     },
  //     password: {
  //         required: " Please enter a password",
  //         minlength: " Your password must be consist of at least 5 characters"
  //     },
  //     confirm_password: {
  //         required: " Please enter a password",
  //         minlength: " Your password must be consist of at least 5 characters",
  //         equalTo: " Please enter the same password as above"
  //     },
  //     agree: "Please accept our policy"
  // },
  highlight: function(element) {
    // add a class "errorClass" to the element
    $(element).addClass('errorClass');
    },
    unhighlight: function(element) {
    // class "errorClass" remove from the element
    $(element).removeClass('errorClass');
    }
    // submitHandler: function(form) {
    // // now submit the form.
    // }
});

// Form Validation


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
  $('#pwa_password').on('keypress', function(e) {
    if (e.which == 32){
        console.log('Space Detected');
        return false;
    }
  });

  // Login page validation
  $('#pwa_createbtnbtn').click(function() {
    // Email validation
      var userinput = $('#pwa_email').val();
      var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(userinput)) {
    $('.notvalid_email').html('| Please enter a valid email!');
    return false;
  }
  // End Email validation
  // Password validation
  var pass_lenght = $('#pwa_password').val();
  if(pass_lenght > 8) {
    $('.notvalid_pass').html('| Min 8 character!');
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
      return false;
    }
  });
  // End Forgot mail validation

  // Sign up validation

  $('#pwa_createbtnsign').click(function() {
    alert('hello');
  });

  // End Sign up validation

});

// custom validation vikram
