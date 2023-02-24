<?php
//session_set_cookie_params(0);
session_start();
$con = mysqli_connect("localhost","cvinfote_tro_tentop","pwa@1234567890","cvinfote_tro_tentop");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>