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
                    
                    <div class="dash-title"><p>Monthly Usage</p><span>0kWh</span></div>
                    <div class="dash-title offline"><img src="images/Frame_16.png"><br><span>Offline</span></div>
                                                                        
                    <div class="dash-title"><p>Remaining Usage</p><span><?php echo ($result_array['energy_plan']!="") ? $kw : '-----' ?></span></div>
                </div>
                <div class="graph-img">
                    <img src="images/Graph.png">
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script> -->
<?php include('footer.php'); ?>
