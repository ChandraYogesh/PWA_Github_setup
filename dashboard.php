<?php

include('header.php');

    

session_start();









if($_COOKIES['login_check']==1)

 $_SESSION['email_verified']=$_COOKIES['email_verified'];

 

 

//  $sqlplan = "SELECT * FROM `pwa_registration` WHERE pwa_email='".$_SESSION['email_verified']."' and pwa_status=1 and energy_plan IS NOT NULL";

$sqlplan ="SELECT pr.*,pri.*, IFNULL(SUM(pri.kwh),0) ALL_kwh FROM prices pri INNER JOIN pwa_registration pr ON pr.pwa_choice = pri.location_id WHERE pwa_email='".$_SESSION['email_verified']."' and pwa_status=1 and energy_plan IS NOT NULL GROUP BY pri.location_id ";

$result = mysqli_query($con, $sqlplan);

// echo '<pre>';

if ($result->num_rows == 0) {

    echo "<script>window.location.href='https://tro.tentoptoday.com/payment_board.php';</script>";

    exit;    

} else{

    $result_array=mysqli_fetch_assoc($result);

    // echo '<pre>';

    // print_r($result_array);

    //  die();

     $sqlUsedkwh = "SELECT IFNULL(ROUND(SUM(daily_uses),0),0) used_kwh FROM daily_use WHERE  location_id = ".$result_array['location_id']." GROUP BY location_id";

     $usedresult = mysqli_query($con, $sqlUsedkwh);

    if ($usedresult->num_rows > 0) {

        $result_usedarray=mysqli_fetch_assoc($usedresult);

        $result_array['kwh'] = ($result_array['ALL_kwh'] - $result_usedarray['used_kwh']);
        // print_r($result_array['kwh']); die();

    }else{

        $result_array['kwh'] = $result_array['ALL_kwh'];

    }

    // print_r($result_array);

    // die();

}



$sqlsevendays = "SELECT SUM(daily_uses) FROM daily_use WHERE location_id = {$result_array['location_id']} && date > DATE_SUB(NOW(), INTERVAL 7 DAY)";

 $sevendaysresult = mysqli_query($con, $sqlsevendays);

  if ($sevendaysresult->num_rows > 0) {

        $result_sevendaysusedarray=mysqli_fetch_assoc($sevendaysresult);
        // print_r($result_sevendaysusedarray); die();

  }else{

      echo "not data";

  }

  

  $sqlmonth = "SELECT SUM(daily_uses) FROM daily_use WHERE location_id = {$result_array['location_id']} && date > DATE_SUB(NOW(), INTERVAL 30 DAY)";
//   print_r($sqlmonth); die();

 $monthresult = mysqli_query($con, $sqlmonth);

  if ($monthresult->num_rows > 0) {

        $result_monthresult =mysqli_fetch_assoc($monthresult);

  }else{

      echo "not data";

  } 

  $sqlyear = "SELECT SUM(daily_uses) FROM daily_use WHERE location_id = {$result_array['location_id']} && date > DATE_SUB(NOW(), INTERVAL 1 YEAR)";

 $yearresult = mysqli_query($con, $sqlyear);

  if ($yearresult->num_rows > 0) {

        $result_yearresult =mysqli_fetch_assoc($yearresult);

  }else{

      echo "not data";

  } 

  $sql3month = "SELECT SUM(daily_uses) FROM daily_use WHERE location_id = {$result_array['location_id']} && date > DATE_SUB(NOW(), INTERVAL 3 MONTH)";

 $month3result = mysqli_query($con, $sql3month);

  if ($month3result->num_rows > 0) {

        $result_month3result =mysqli_fetch_assoc($month3result);

  }else{

      echo "not data";

  } 

  

  

  

  // print_r($result_month3result);

  // die();

// echo '<pre>';

// print_r($result_array);

// die();

// if($result_array['kwh'])

// $kw=" 200 kwh";

// elseif($result_array['kwh'])

// $kw="600 kWh";

// else

// $kw="800 kWh";









$curl = curl_init();

$timeperiod=3;



 $device_id='D2232A0004349454CEAB68';   

//echo  "http://3.85.30.147:8080/webapi/webapi/pwa/v2/?time_period=".$timeperiod."&device_id=".$device_id."";

curl_setopt_array($curl, array(

  CURLOPT_URL => "http://3.85.30.147:8080/webapi/webapi/pwa/v2/?time_period=".$timeperiod."&device_id=".$device_id."",

  CURLOPT_RETURNTRANSFER => true,

  CURLOPT_ENCODING => '',

  CURLOPT_MAXREDIRS => 10,

  CURLOPT_TIMEOUT => 0,

  CURLOPT_FOLLOWLOCATION => true,

  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

  CURLOPT_CUSTOMREQUEST => 'GET',

));





$response = curl_exec($curl);

$response=json_decode($response);



//print_r($response);

curl_close($curl);

if($response->charger_on==1)

$charge_capacity=1;

else

$charge_capacity=0;



?>  







  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

  <link rel="stylesheet" href="/resources/demos/style.css">

  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

<link href="https://raw.githack.com/jamiebicknell/Toggle-Switch/master/toggleswitch.css" rel="stylesheet" />

<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js'></script>

<script type='text/javascript' src='https://raw.githack.com/jamiebicknell/Toggle-Switch/master/jquery.toggleswitch.js'></script>

  

  <script>

  $( function() {

      

      $( "#slider" ).mouseleave(function() {

              if( $("#slide1").val()<50)

                $("#slider").slider('value',0);

              else

                 $("#slider").slider('value',77);

      });

      

    $( "#slider" ).slider({

         

       value:<?php echo $charge_capacity==1?80:0; ?>,

      slide: function( event, ui ) {

                    

                     $("#slide1").val(ui.value);

             

             

             console.log(ui.value);

               if(ui.value>50&&$("#charge_status").val()==0)

               {

                   

                   $("#charge_status").val(1);

                   $(".charging_wrap").html(' <i class="fa fa-angle-double-left" aria-hidden="true"></i>Swipe left to stop charging ') ;

                   $(".charging_wrap").removeClass("righ_css");

                   $(".charging_wrap").addClass("left_css");

                        set_charge=1;

                               $('.onofspan').text('Charging');

                               $('.onofspan_image').attr('src','images/charging.png')

                        $.ajax({ 

                             url: 'mod_change.php',

                            data: {plan_id: 3,set_charge:1},

                            type: 'post',

                            success: function(result)

                            {

                            

             

                            }

                        });

                                      

                    

                  

               }

               

               if(ui.value<50&&$("#charge_status").val()==1)

               {

                   $("#charge_status").val(0);

                   $(".charging_wrap").html('<i class="fa fa-angle-double-right" aria-hidden="true"></i>Swipe right to start charging ') ;

                   $(".charging_wrap").removeClass("left_css");

                   $(".charging_wrap").addClass("right_css");

                     $('.onofspan').text('Offline');

                             $('.onofspan_image').attr('src','images/Frame_16.png')

                      $.ajax({ 

                            url: 'mod_change.php',

                            data: {plan_id: 3,set_charge:0},

                            type: 'post',

                            success: function(result)

                            {

                                  

                               

                            

              

                            }

                        });

                        

               }

       

        if(ui.value>77)

          return false

         

               

 

    

      }

    } 

        );

  } );

  </script>

<div class="container">

   

    

    <div class="row">

        <div class="welcome_box dashboard_box">

            <input type="hidden" name="slide1" id="slide1" value=""/>

            <input type="hidden" name="charge_status" id="charge_status" value="<?php echo $charge_capacity; ?>">

        <?php 

      

        include('navbarfile.php'); ?>

            <div class="login_box_internalNew">

                 <h5>Energy Statistics</h5>

                 <?php if ( ( $_SESSION['email_verified']=='chetansoun2008@gmail.com' ) || ( $_SESSION['email_verified']=='stephanie.mckinney@lhi-cts.com' ) ) { ?>

                <div class="dashboard-top-wrap">

                    

                    <div class="dash-title"><p class='mywd' id="weekdata">Monthly Usage</p><span><span class='mywd_span'>0</span>kWh</span></div>

                    <div class="dash-title offline"><img class='onofspan_image' src="images/Frame_16.png" ><br><span class='onofspan'>Offline</span></div>

                                                                        

                    <div class="dash-title"><p>Remaining Usage</p><span class="remaningspan"><?php echo $result_array['kwh'] ? $result_array['kwh'] : 0 ?> kWh</span></div>

                </div>

                

                

                <div class="graph-img"><p style="margin: 0;padding: 0;font-weight: bold;font-size: 10px;padding-left: 5px;padding-bottom: 2px;">Kwh</p>

                    <canvas  id="chartjs_line"></canvas>

                </div>

                

                

                <br/>

          

                <input type="hidden" id="default_mailid" data-emailid_default='<?php echo $_SESSION['email_verified']; ?>'>

                <div class="week_data">
                    
                    <div class="days_css" data-plan='3' id="onedayid"  data-emailid='<?php echo $_SESSION['email_verified']; ?>' data-kwh='<?php echo $result_array['kwh'] ? $result_array['kwh'] : 0 ?>'>1D</div>

                    <div class="days_css2" data-plan='4' id="week" data-emailid='<?php echo $_SESSION['email_verified']; ?>' data-kwh='<?php echo $result_array['kwh'] ? $result_array['kwh'] : 0?>'>1W</div>

                    <div class="days_css3" data-plan='5' data-emailid='<?php echo $_SESSION['email_verified']; ?>' data-kwh='<?php echo $result_array['kwh'] ? $result_array['kwh'] : 0?>'>1M</div>

                     <div class="days_css5" data-plan='6' data-emailid='<?php echo $_SESSION['email_verified']; ?>' data-kwh='<?php echo $result_array['kwh'] ? $result_array['kwh'] : 0?>'>3M</div>

                    <div class="days_css4"  data-emailid='<?php echo $_SESSION['email_verified']; ?>' data-kwh='<?php echo $result_array['kwh'] ? $result_array['kwh'] : 0?>'>1Y</div>

                </div>

                <?php } else { ?>
1
                <div style="text-align: center;color: #fff;font-size: 20px;font-weight: bold;">You don't have any device!</div>

                <?php } ?>

                

                    <div id="slider">

                      <?php echo  $charge_capacity==1?'<span class="charging_wrap left_css"><i class="fa fa-angle-double-left" aria-hidden="true"></i>Swipe left to stop charging   </span>   ':' <span class="charging_wrap right_css"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Swipe right to start charging</span>'; ?>       

                    </div>
            </div>

        </div>

    </div>

</div>





<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script> -->

<style>

.week_data {

    display: flex;

    justify-content: space-evenly;

}
/*.active-selected{*/
/*    background-color:#49c908;*/
/*}*/


.days_css {

    border: 1px solid #fff;

    padding: 0px 14px;

    border-radius: 40px;

    color: #fff;

    font-weight: 600;

    cursor: grab;

}   

.days_css2 {

    border: 1px solid #fff;

    padding: 0px 14px;

    border-radius: 40px;

    color: #fff;

    font-weight: 600;

    cursor: grab;

} 

.days_css3 {

    border: 1px solid #fff;

    padding: 0px 14px;

    border-radius: 40px;

    color: #fff;

    font-weight: 600;

    cursor: grab;

} 

.days_css4 {

    border: 1px solid #fff;

    padding: 0px 14px;

    border-radius: 40px;

    color: #fff;

    font-weight: 600;

    cursor: grab;

} 

.days_css5 {

    border: 1px solid #fff;

    padding: 0px 14px;

    border-radius: 40px;

    color: #fff;

    font-weight: 600;

    cursor: grab;

} 



   .ui-slider .ui-slider-handle {

    position: absolute;

    z-index: 2;

    width: 73px;

    height: 1.2em;

    cursor: pointer;

    -ms-touch-action: none;

    touch-action: none;

}

span.charging_wrap.right_css {

    padding-left: 75px;

}

span.charging_wrap.left_css {

    padding-left: 22px;

}

span.ui-slider-handle.ui-corner-all.ui-state-default:focus-visible {

    outline: none;

}

.ui-slider-horizontal .ui-slider-range {

    top: 0;

    height: 100%;

    background: transparent;

}

span.ui-slider-handle.ui-corner-all.ui-state-default {

   

    background-image: url(images/buttonslide.png);

    border: 0;

    height: 50px;

}

.ui-slider-horizontal .ui-slider-handle {

    top: -3px;

 



}

.ui-state-default, .ui-widget-content .ui-state-default{background:transparent;}

  



.ui-widget.ui-widget-content {

    border: 1px solid #c5c5c5;

}

.ui-widget-content {

    background: #3A72DE;

    color: #fff;

    height: 51px;

    width: 268px;

    margin: auto;

    border-radius: 28px !important;

    border: 0px !important;

    border: solid #B1D34F 3px !important;

    margin-top: 26px;

    line-height: 51px;

}

span.charging_wrap {

    font-size: 13px;

    padding-left: 50px;



        display: block;

}

</style>

<script>

$(document).ready(function() {



$("#customRange1").change(function(){

    

  console.log($(this).val());

});


    $(document).on('click','.days_css',function() {

       

        var plan_id = $(this).attr('data-plan');

        var email_id = $(this).attr('data-emailid');

        var kwh = $(this).attr('data-kwh');

        var kwhdata = kwh.replace(/[kwh]/g, '');
        // print_r('kwhdata'); die();

         $('.days_css').removeAttr("style");

         $('.days_css3').removeAttr("style");

        $('.days_css2').removeAttr("style");

        $('.days_css4').removeAttr("style");

        $('.days_css5').removeAttr("style");

        $(this).css('background-color','#49c908');
        

        $.ajax

        ({ 

            url: 'device_details.php',

            data: {plan_id: plan_id, email_id:email_id},

            type: 'post',

            success: function(result)

            {

              result = JSON.parse(result);

              console.log(result);

              var on_or_off = result.device_connected  

              var charger_on=result.charger_on 

              var kwh_value = result.total_used_kWhs
              

              var kwh_value2 = kwh_value.toString().split('.')[0];

              var final_kwh2 = kwh_value2/1000;

            //   var kwhdata = bcsub(data-kwh.final_kwh2);

              

              $('.mywd_span').text(final_kwh2);

            //   alert(final_kwh2);

              var finalkwhvalue = Math.ceil(kwhdata);

              $('.remaningspan').text(<?php echo $result_array['kwh'] ? $result_array['kwh']: 0 ?> .kWh);

              

            //   update(finalkwhvalue);

              // dailyuse(final_kwh2);

             

              

            



             

             

              

            //   Graph Data

                var checkleanth =  result.usagePerPeriodList;

              const month_arr = [];

              for(let x = 0; x < checkleanth.length; x++) {

                month_arr.push(result.usagePerPeriodList[x]['date']);

              };

              const usage_arr = [];

              for(let y = 0; y < checkleanth.length; y++) {

                var kwh_value = result.usagePerPeriodList[y]['usage']

                var kwh_value2 = kwh_value.toString().split('.')[0];

                var final_kwh2 = kwh_value2/1000;

                usage_arr.push(final_kwh2);

              };



              new Chart("chartjs_line", {

              type: "line",

              data: {

                labels: month_arr,

                datasets: [{

                    pointRadius: 5,

                fill: false,

                lineTension: 0,

                backgroundColor: "rgba(0,0,255,1.0)",

                borderColor: "rgba(0,0,255,0.1)",

                data: usage_arr

                }]

              },

              options: {

                legend: {display: false},

                events: ['click']

                // scales: {

                // yAxes: [{ticks: {min: 6, max:16}}],

                // }

              }

              });

            // Graph Data

              

              if(plan_id=='3') {

                $('.mywd').html('Days Usage');

              } else if(plan_id=='4') {

                $('.mywd').html('Weekly Usage');    

              } else if(plan_id=='5') {

                $('.mywd').html('Monthly Usage');    

              } else {

                $('.mywd').html('Yearly Usage');

              }

               if(charger_on==true) {

                $('.onofspan').text('Charging');

                $('.onofspan_image').attr('src','images/charging.png')

              }

              else

              {

                  $('.onofspan').text('Offline');

                $('.onofspan_image').attr('src','images/Frame_16.png')

              }

            }

        });

    });

    //  $finalinsert = "INSERT INTO prices (remaing_value)

    //           VALUES (finalkwhvalue)";

    //           if ($conn->query($finalinsert) === TRUE) {

    //           echo "New record created successfully";

    //         } else {

    //           echo "Error: " . $sql . "<br>" . $conn->error;

    //         }

    

    var plan_id = 3;

  statusUpdate(3);  

function statusUpdate(plan_id)

  {

    var email_id = $('#default_mailid').attr('data-emailid_default');

        $('.days_css').removeAttr("style");

        $('#onedayid').css('background-color','#49c908');

        $('.mywd').html('Days Usage');

        

        $.ajax

        ({ 

            url: 'device_details.php',

            data: {plan_id: plan_id, email_id:email_id},

            type: 'post',

            success: function(result)

            {

              result = JSON.parse(result);

              console.log(result);

              var on_or_off = result.device_connected  

               var charger_on = result.charger_on 

              

              

              var kwh_value = result.total_used_kWhs

              var kwh_value2 = kwh_value.toString().split('.')[0];

              $('.mywd_span').text(kwh_value2/1000);  

              

              var final_kwh2 = kwh_value2/1000;

              

              

              $('.mywd_span').text(final_kwh2);

            //   var finalkwhvalue = Math.ceil(kwh);

            //   alert(finalkwhvalue);

            //   $('.remaningspan').text(finalkwhvalue +' kWh'); 
             dailyuse(final_kwh2);

             

              

              // Graph Data

                var checkleanth =  result.usagePerPeriodList;

                // console.log(checkleanth.length);

                const month_arr = [];

                for(let x = 0; x < checkleanth.length; x++) {

                  month_arr.push(result.usagePerPeriodList[x]['date']);

                };

                const usage_arr = [];

                for(let y = 0; y < checkleanth.length; y++) {

                  var kwh_value = result.usagePerPeriodList[y]['usage']

                var kwh_value2 = kwh_value.toString().split('.')[0];

                var final_kwh2 = kwh_value2/1000;

                usage_arr.push(final_kwh2);

                  // usage_arr.push(result.usagePerPeriodList[y]['usage']);

                };



                new Chart("chartjs_line", {

                type: "line",

                data: {

                  labels: month_arr,

                  datasets: [{

                  pointRadius: 5,

                  fill: false,

                  lineTension: 0,

                  backgroundColor: "rgba(0,0,255,1.0)",

                  borderColor: "rgba(0,0,255,0.1)",

                  data: usage_arr

                  }]

                },

                options: {

                  legend: {display: false},

                  events: ['click']

                  // scales: {

                  // yAxes: [{ticks: {min: 6, max:16}}],

                  // }

                }

                });

                

              // Graph Data

              

              

              if(plan_id=='3') {

                $('.mywd').html('Days Usage');

              } else if(plan_id=='4') {

                $('.mywd').html('Weekly Usage');    

              } else if(plan_id=='5') {

                $('.mywd').html('Monthly Usage');    

              } else {

                $('.mywd').html('Yearly Usage');

              }

              if(charger_on==true) {

                $('.onofspan').text('Charging');

                $('.onofspan_image').attr('src','images/charging.png')

              }

              else

              {

                  $('.onofspan').text('Offline');

                $('.onofspan_image').attr('src','images/Frame_16.png')

              }

            }

        });

  }  

  function update(value)

  {

      var location_id = <?php echo $result_array['location_id']; ?>;

      var package_name = "<?php echo $result_array['package_name']; ?>";

    $.ajax

        ({ 

            url: 'device_update.php',

            data: {value:value, location_id:location_id, package_name:package_name},

            type: 'post',

            success: function(response)

            {

                console.log(response);

            }

            

        });

  }

  

  function dailyuse(value)

  {

      var location_id = <?php echo $result_array['location_id']; ?>;



    $.ajax

        ({ 

            url: 'daily_use.php',

            data: {value:value, location_id:location_id},

            type: 'post',

            success: function(result)

            {

                console.log(result);

            }

            

        });

  }

      var weekdata = <?php echo $result_sevendaysusedarray['SUM(daily_uses)']; ?>;

  $( ".days_css2" ).click(function() {

    //   alert(weekdata.toFixed(3));

        var kwh = $(this).attr('weekdata');

        $('.days_css').removeAttr("style");

        $('.days_css3').removeAttr("style");

        $('.days_css4').removeAttr("style");

        $('.days_css5').removeAttr("style");

        $(this).css('background-color','#49c908');

        $('.mywd').html('Weekly Usage');

         $('.mywd_span').text(weekdata.toFixed(3));

         $('.remaningspan').text(<?php echo $result_array['kwh'] ? $result_array['kwh']: 0 ?> .kWh);



              

              

});

   

     var monthdata = <?php echo $result_monthresult['SUM(daily_uses)']; ?>;

  $( ".days_css3" ).click(function() {

    //   alert(weekdata.toFixed(3));

        var kwh = $(this).attr('monthdata');

        $('.days_css2').removeAttr("style");

        $('.days_css').removeAttr("style");

        $('.days_css4').removeAttr("style");

        $('.days_css5').removeAttr("style");

        $(this).css('background-color','#49c908');

        $('.mywd').html('Monthly Usage');

         $('.mywd_span').text(monthdata.toFixed(3));

         $('.remaningspan').text(<?php echo $result_array['kwh'] ? $result_array['kwh']: 0 ?> .kWh);



              

  





});            



 var yeardata = <?php echo $result_yearresult['SUM(daily_uses)']; ?>;

  $( ".days_css4" ).click(function() {

    //   alert(weekdata.toFixed(3));

        var kwh = $(this).attr('yeardata');

        $('.days_css4').removeAttr("style");

      $('.days_css3').removeAttr("style");

        $('.days_css').removeAttr("style");

        $('.days_css4').removeAttr("style");

        $('.days_css5').removeAttr("style");

        $(this).css('background-color','#49c908');

        $('.mywd').html('Yearly Usage');

         $('.mywd_span').text(yeardata.toFixed(3));

         $('.remaningspan').text(<?php echo $result_array['kwh'] ? $result_array['kwh']: 0 ?> .kWh);



              

              

});

var quarterlydata = <?php echo $result_month3result['SUM(daily_uses)']; ?>;

  $( ".days_css5" ).click(function() {

    //   alert(weekdata.toFixed(3));

        var kwh = $(this).attr('quarterlydata');

       $('.days_css4').removeAttr("style");

       $('.days_css3').removeAttr("style");

      $('.days_css5').removeAttr("style");

       $('.days_css4').removeAttr("style");

        $(this).css('background-color','#49c908');

        $('.mywd').html('Quarterly Usage');

         $('.mywd_span').text(quarterlydata.toFixed(3));

         $('.remaningspan').text(<?php echo $result_array['kwh'] ? $result_array['kwh']: 0 ?> .kWh);



             
      });




});









</script>







<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<?php include('footer.php'); ?>

