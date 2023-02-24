<?php
session_start();
if(isset($_SESSION['email_verified'])){
$loginsession = $_SESSION['email_verified'];
}
if(!empty($loginsession)) {
// echo 'no session';
echo "<script>window.location.href='https://tro.tentoptoday.com/dashboard.php';</script>";
exit();
}
include('header.php');
?>  
<div class="container">
    <div class="row">
        <div class="welcome_box welcome_box_home">
            <div class="welcome_box_internal">
                <img src="images/welcome.svg" alt="Welcome TRO Energy">
            </div>
            <div class="login_signup">
                 <p style="display: inline-block;margin-bottom: 25px;"><a href="/login.php" style="background: rgb(177, 211, 79); font-size: 14px; font-weight: 600!important; font-family: 'Montserrat', sans-serif;padding: 8px 40px; border-radius: 20px;color: #000;text-decoration:none;">Login</a></p>
                 <p><a href="/signup.php" style="background: unset;border: 1px solid rgb(177, 211, 79);color: rgb(177, 211, 79);font-size: 14px;font-weight: 600!important; font-family: 'Montserrat', sans-serif; padding: 8px 30px; border-radius: 20px;text-decoration:none;">Sign Up</a></p>   
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
