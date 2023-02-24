$(document).ready(function(){



$('#pwa_choices').on('change', function() {

    var choicevalue = $(this).val();

     alert(choicevalue);





    $.ajax({

        url:'get_locations_value_ajax.php',

        data:{'location_id':choicevalue},

        type:'post',

        success:function(result_data) {

            result = JSON.parse(result_data);

            // console.log(result[0]);

            $('#pwa_zipcode').val(result[0]);

            $('#pwa_state').val(result[1]);

        }

    });

});







// Get value from of price and location 



var use_palnch = $('#user_planchoice').val();

// alert(use_palnch);

// if(use_palnch=='Hill Air Force Base') {

//   var stripe_pr_id = 'prod_MWRzDuxNnEi77U';

// } else if(use_palnch=='Vandenberg Space Force Base') {

//   var stripe_pr_id = 'prod_MWRpo2WtycSX2i';

// } else {

//   var stripe_pr_id = 'prod_MWRnsyF8GOst7n';

// }

    $.ajax

      ({ 

          url: 'get_locations_price_ajax.php',

          data: {"choice_id": use_palnch},

          type: 'post',

          success: function(result_data)

          {

             

            result = JSON.parse(result_data);

           

            var vkwh = result[4];

            var mieq = result[5];

            var dollar_mi = result[6];

            var package_name = result[3];

            var lcprice = result[7];

            var salesTax = result[8];
            
            var totalPrice = result[9];

            

            var dotsRemoved = lcprice.replace(/\./g, '');

            $('.pr_kwh_name').html(vkwh);

            $('.pr_mieq_name').html(mieq);

            $('.pr_dollarmi_name').html(dollar_mi);

            $('.pr_orginal_name').html(package_name);

            $('.pr_orginal_price').html(lcprice);

             $('.pr_sales_tax').html(salesTax);
             
             $('.total_pr_price').html(totalPrice);

            $('#selected_planoption').val(package_name);

            $('#prorginalpr2').val(lcprice);

            $('#selected_planprice').val(dotsRemoved);

            $('#selected_planoption_account').val(package_name);

            

          }

      });





      $(".spricec").click(function(){

        var use_palnch_2=jQuery(this).attr('data-prid');  

        $.ajax

      ({ 

          url: 'get_locations_price_ajax.php',

          data: {"choice_id": use_palnch_2},

          type: 'post',

          success: function(result_data)

          {

            result = JSON.parse(result_data);

            // console.log(result[1]);

            var vkwh = result[4];

            var mieq = result[5];

            var dollar_mi = result[6];

            var package_name = result[3];

            var lcprice = result[7];

            var salesTax = result[8];
            
            var totalPrice = result[9];

            

            var dotsRemoved = lcprice.replace(/\./g, '');

            $('.pr_kwh_name').html(vkwh);

            $('.pr_mieq_name').html(mieq);

            $('.pr_dollarmi_name').html(dollar_mi);

            $('.pr_orginal_name').html(package_name);

            $('.pr_orginal_price').html(lcprice);

            $('.pr_sales_tax').html(salesTax);
            
            $('.total_pr_price').html(totalPrice);

            $('#prorginalpr2').val(lcprice);

            $('#selected_planoption').val(package_name);

            $('#selected_planprice').val(dotsRemoved);

          }

      });

        

    });

      

// Get value from of price and location   





});