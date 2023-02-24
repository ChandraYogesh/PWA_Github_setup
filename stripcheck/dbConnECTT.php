<?php
session_set_cookie_params(0);
session_start();
$con = mysqli_connect("localhost","trocvinfotech_crmapi","QgEXrdYS9_o.","trocvinfotech_crmapi");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>