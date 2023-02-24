<?php
require('dbConnECTT.php');

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


$crmail = $_SESSION['email_verified'];
if($_POST['pwa_old_passwordvalue']=='') {
   $sql = "SELECT id FROM `pwa_registration` WHERE pwa_password='".$_POST['pwa_old_passwordvalue']."' and pwa_email='".$crmail."' and email_verified=1";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) > 0) {  



if(isset($_POST['pwa_updatebtn'])) {
    
    

$pwa_name = mysqli_real_escape_string($con,$_POST['pwa_name']);
$pwa_email = $_SESSION['email_verified'];
$pwa_password = mysqli_real_escape_string($con,$_POST['pwa_password']);
// $pwa_cpassword = mysqli_real_escape_string($con,$_POST['pwa_cpassword']);
$pwa_mobile = mysqli_real_escape_string($con,$_POST['pwa_mobile']);
$pwa_choices = mysqli_real_escape_string($con,$_POST['pwa_choices']);
$pwa_address1 = mysqli_real_escape_string($con,$_POST['pwa_address1']);
$pwa_address2 = mysqli_real_escape_string($con,$_POST['pwa_address2']);
$pwa_zipcode = mysqli_real_escape_string($con,$_POST['pwa_zipcode']);
$pwa_state = mysqli_real_escape_string($con,$_POST['pwa_state']);
$date_today = date('Y-m-d');
$session_mail = $_SESSION['email_verified'];
$sqlupdate = "UPDATE `pwa_registration` SET `pwa_name`='$pwa_name',`pwa_email`='$pwa_email',`pwa_password`='$pwa_password',`pwa_mobile`='$pwa_mobile',`pwa_choice`='$pwa_choices',`pwa_add1`='$pwa_address1',`pwa_add2`='$pwa_address2',`pwa_zip`='$pwa_zipcode',`pwa_state`='$pwa_state' WHERE pwa_email='$session_mail'";
if (mysqli_query($con, $sqlupdate)) {
  $_SESSION['aacount_updatee'] = 'Account updated!';
  header('location:account.php');
  exit();
  // echo "record created successfully";
  
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
}
else {
header('location:index.php');
exit();
}
}
} elseif($_POST['pwa_old_passwordvalue']!='') {
  $sql = "SELECT id FROM `pwa_registration` WHERE pwa_password='".$_POST['pwa_old_passwordvalue']."' and pwa_email='".$crmail."' and email_verified=1";
  $result = mysqli_query($con, $sql);
  // echo '<pre>';
  // print_r($result);
  // die();
  if (mysqli_num_rows($result) > 0) {
    if(isset($_POST['pwa_updatebtn'])) {
      $pwa_name = mysqli_real_escape_string($con,$_POST['pwa_name']);
      $pwa_email = $_SESSION['email_verified'];
      $pwa_password = mysqli_real_escape_string($con,$_POST['pwa_password']);
      // $pwa_cpassword = mysqli_real_escape_string($con,$_POST['pwa_cpassword']);
      $pwa_mobile = mysqli_real_escape_string($con,$_POST['pwa_mobile']);
      $pwa_choices = mysqli_real_escape_string($con,$_POST['pwa_choices']);
      $pwa_address1 = mysqli_real_escape_string($con,$_POST['pwa_address1']);
      $pwa_address2 = mysqli_real_escape_string($con,$_POST['pwa_address2']);
      $pwa_zipcode = mysqli_real_escape_string($con,$_POST['pwa_zipcode']);
      $pwa_state = mysqli_real_escape_string($con,$_POST['pwa_state']);
      $date_today = date('Y-m-d');
      $session_mail = $_SESSION['email_verified'];
      $sqlupdate = "UPDATE `pwa_registration` SET `pwa_name`='$pwa_name',`pwa_email`='$pwa_email',`pwa_password`='$pwa_password',`pwa_mobile`='$pwa_mobile',`pwa_choice`='$pwa_choices',`pwa_add1`='$pwa_address1',`pwa_add2`='$pwa_address2',`pwa_zip`='$pwa_zipcode',`pwa_state`='$pwa_state' WHERE pwa_email='$session_mail'";
      if (mysqli_query($con, $sqlupdate)) {
        $_SESSION['aacount_updatee'] = 'Account updated!';
        header('location:account.php');
        exit();
        // echo "record created successfully";
        
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
      }
} else {
  $_SESSION['old_pas_notmatch'] = 'Please enter current password!';
  header('location:account.php');
  exit();
}
}

mysqli_close($con);
?>