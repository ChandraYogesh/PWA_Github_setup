<?php
session_start();
$con = mysqli_connect("localhost","cvinfote_pwa_cst","AeFw[2St&#!,","cvinfote_pwa_cst");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

   $oldpassword = mysqli_real_escape_string($con,$_POST['oldpassword']);

   $sql = "SELECT id FROM `pwa_registration` WHERE pwa_password='".$oldpassword."' and pwa_email='".$_SESSION['email_verified']."' and pwa_status=1";
   $result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // echo 'hello';
} else {
   echo '| Password not match!';
}
?>
