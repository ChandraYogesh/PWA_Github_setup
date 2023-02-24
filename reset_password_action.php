<?php
require('dbConnECTT.php');
if(isset($_POST['pwa_reset_submit'])) {
    $pwa_password=$_POST['reset_passwordname'];
    $user_email=$_POST['usermailid'];
    $sqlupdate = "UPDATE `pwa_registration` SET `pwa_password`='$pwa_password' WHERE pwa_email='$user_email'";
if (mysqli_query($con, $sqlupdate)) {
  $_SESSION['password_reset'] = 'Password updated successfully!';
  header('location:login.php');
  exit();
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
}
?>