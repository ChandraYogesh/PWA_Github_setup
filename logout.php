<?php
session_start();
$_SESSION['email_verified']='';
session_destroy();
  setcookie('login_check', 1, time() + (86400 * 30), "/");
header('location:https://tro.tentoptoday.com/index.php');
exit();
?>