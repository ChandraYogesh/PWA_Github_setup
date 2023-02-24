<?php
session_start();
if($_SESSION['email_verified']=="") {
	header('location:https://tro.tentoptoday.com');
	exit();
}
include('header.php'); ?>  
<div class="container">
    <div class="row">
        <div class="payment_board welcome_box email_verify_box ">
            <?php include('navbarfile.php');
            
             $_SESSION['email_verified'];
          
          $sqlplan = "SELECT pwa_choice FROM `pwa_registration` WHERE pwa_email='".$_SESSION['email_verified']."' and pwa_status=1";
            $result = mysqli_query($con, $sqlplan);
            $result_array=mysqli_fetch_assoc($result);
            
            ///print_r($result_array['pwa_choice']);
            
            ?>

  <!-- swiper1 -->
  <div class="selected_payment-wrapper">
  
  <!-- swiper2 -->
  
  
            <?php
            
            
             $imageName="";
            if($result_array['pwa_choice']=='Vandenberg Space Force Base')
             {$imageName="Component_28.png";
             }
             elseif($result_array['pwa_choice']=='Submarine Base New London'){
                 $imageName="submarin1.png";
             }
             else
             {$imageName="submarin2.png";}
             ?>
             
   <img src="https://tro.tentoptoday.com/images/<?php echo $imageName; ?>" alt=""> 
   
   </div>

  
<?php include('footer.php'); ?>
