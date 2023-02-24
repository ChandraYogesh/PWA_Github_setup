<?php require('dbConnECTT.php');
if(isset($_POST['pwa_email'])) {
$pwa_email = mysqli_real_escape_string($con,$_POST['pwa_email']);
$pwa_password = mysqli_real_escape_string($con,$_POST['pwa_password']);

$sql = "SELECT * FROM `pwa_registration` WHERE pwa_email='".$pwa_email."' and pwa_password='".$pwa_password."'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  $email_verified= $row['email_verified'];
  if($email_verified != 1){
    $_SESSION['email_verify'] = $pwa_email;
    header('location:https://tro.tentoptoday.com/email_verify.php');
    exit();
  }
  else{
    $_SESSION['email_verified'] = $pwa_email;
    header('location:https://tro.tentoptoday.com/dashboard.php');
    exit();
  }
  // echo $_SESSION['email_verified'];
  // die();
 
  
} else {
  $_SESSION['detail_wrong'] = 'Sorry, something does not match our records. Please check your spelling and try again!';
  header('location:https://tro.tentoptoday.com/login.php');
  exit();
}
mysqli_close($con);
 } 
 else {
  header('location:https://tro.tentoptoday.com');
  exit();
}

?>