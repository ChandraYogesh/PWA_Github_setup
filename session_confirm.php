<?php
session_start();
if(isset($_SESSION['email_verified'])&&$_COOKIE['login_check']==1) {
    
header('location:https://tro.tentoptoday.com/dashboard.php');
exit();
}  
?>