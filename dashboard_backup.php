<?php
include('header.php');
session_start();
$sqlplan = "SELECT * FROM `pwa_registration` WHERE pwa_email='".$_SESSION['email_verified']."' and pwa_status=1 and energy_plan IS NOT NULL";
$result = mysqli_query($con, $sqlplan);
if ($result->num_rows!=1) {
echo "<script>window.location.href='https://www.troes.io/payment_board.php';</script>";
exit;    
}
$result_array=mysqli_fetch_assoc($result);
if($result_array['energy_plan']=='Base Package 1')
$kw="200 kWh";
elseif($result_array['energy_plan']=='Base Package 2')
$kw="600 kWh";
else
$kw="800 kWh";
?>  
<div class="container">
    <div class="row">
        <div class="welcome_box dashboard_box">
        <?php include('navbarfile.php'); ?>
            <div class="login_box_internalNew">
                 <h5>Energy Statistics</h5>
                <div class="dashboard-top-wrap">
                    
                    <div class="dash-title"><p class='mywd'>Monthly Usage</p><span><span class='mywd_span'>0</span> kWh</span></div>
                    <div class="dash-title offline"><img class='onofspan_image' src="images/Frame_16.png"><br><span class='onofspan'>Offline</span></div>
                                                                        
                    <div class="dash-title"><p>Remaining Usage</p><span class="remaningspan"><?php echo ($result_array['energy_plan']!="") ? $kw : '-----' ?></span></div>
                </div>
                
                <div class="graph-img">
                    <img src="images/Graph.png">
                </div>
                <br/>
                <div class="week_data">
                    <div class="days_css" id="onedayid" data-plan='3'>1D</div><div class="days_css" data-plan='4'>1W</div><div class="days_css" data-plan='5'>1M</div><div class="days_css" data-plan='6'>1Y</div>
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
.days_css {
    border: 1px solid #fff;
    padding: 0px 14px;
    border-radius: 40px;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
}    
</style>
<script>
$(document).ready(function() {

    $(document).on('click','.days_css',function() {
        var plan_id = $(this).attr('data-plan');
        $('.days_css').removeAttr("style");
        $(this).css('background-color','#49c908');
        
        $.ajax
        ({ 
            url: 'device_details.php',
            data: {"plan_id": plan_id},
            type: 'post',
            success: function(result)
            {
              result = JSON.parse(result);
              console.log(result);
              var on_or_off = result.charger_on   
              var kwh_value = result.total_used_kWhs
              var kwh_value2 = kwh_value.toString().split('.')[0];
              var final_kwh2 = kwh_value2/1000;
              
              $('.mywd_span').text(kwh_value2/1000);
              var finalkwhvalue = Math.ceil(800-final_kwh2);
              $('.remaningspan').text(finalkwhvalue +' kWh');     
              if(plan_id=='3') {
                $('.mywd').html('Days Usage');
              } else if(plan_id=='4') {
                $('.mywd').html('Weekly Usage');    
              } else if(plan_id=='5') {
                $('.mywd').html('Monthly Usage');    
              } else {
                $('.mywd').html('Yearly Usage');
              }
              if(on_or_off==true) {
                $('.onofspan').text('Online');
                $('.onofspan_image').attr('src','images/connected_charge.png')
              }
            }
        });
    });
    var plan_id = 3;
        $('.days_css').removeAttr("style");
        $('#onedayid').css('background-color','#49c908');
        $('.mywd').html('Days Usage');
        
        $.ajax
        ({ 
            url: 'device_details.php',
            data: {"plan_id": plan_id},
            type: 'post',
            success: function(result)
            {
              result = JSON.parse(result);
              console.log(result);
              var on_or_off = result.charger_on   
              var kwh_value = result.total_used_kWhs
              var kwh_value2 = kwh_value.toString().split('.')[0];
              $('.mywd_span').text(kwh_value2/1000);  
              
              var final_kwh2 = kwh_value2/1000;
              
              var finalkwhvalue = Math.ceil(800-final_kwh2);
              $('.remaningspan').text(finalkwhvalue +' kWh');
              
              if(plan_id=='3') {
                $('.mywd').html('Days Usage');
              } else if(plan_id=='4') {
                $('.mywd').html('Weekly Usage');    
              } else if(plan_id=='5') {
                $('.mywd').html('Monthly Usage');    
              } else {
                $('.mywd').html('Yearly Usage');
              }
              if(on_or_off==true) {
                $('.onofspan').text('Online');
                $('.onofspan_image').attr('src','images/connected_charge.png')
              }
            }
        });

});  
</script>
<?php include('footer.php'); ?>
