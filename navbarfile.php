<!-- Menu Bar -->
<div class="container topbar">
            <div class="row">
                <!-- <div class="col-4 backbtn" style="margin-top: 10px;"><img src="images/backicon.png" alt="">&nbsp;&nbsp; Back</div> -->
                <div class="col-6 text-left"><a href="https://tro.tentoptoday.com/index.php"><img src="images/logo.png" alt=""></a></div>
                <div class="col-6" style="text-align: right; margin-top: 10px;">
                <nav class="navbar" style="margin-top: -10px;">
  <div class="container-fluid">
    <button class="navbar-toggler ms-auto" type="button" data-mdb-toggle="collapse"
      data-mdb-target="#navbarToggleExternalContent3" aria-controls="navbarToggleExternalContent3"
      aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
  </div>
</nav>
<div class="collapse" id="navbarToggleExternalContent3">
  <div class="bg-light shadow-3 p-2">
    <ul>
        <!-- <li><a href="login.php">Login</a></li>
        <li><a href="signup.php">Sign Up</a></li>
        <li><a href="email_verify.php">Email Verify</a></li>
        <li><a href="email_confirmed.php">Email Verify Confirmed</a></li> -->
        <?php if(isset($_SESSION['email_verified'])) { ?>
        <li><a href="index.php">Home</a></li>
         <li><a href="payment_board.php">Energy Options</a></li>
          <li><a href="account.php">Account</a></li>
          <?php
          $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";  
          if($actual_link!="https://tro.tentoptoday.com/payment_board_2.php" && $actual_link!="https://tro.tentoptoday.com/pwa_payment.php") { ?>
          <li><a href="javascript:void(0)" id="installApp" class="install-app-btn-container">Download</a></li>
          <?php } ?>
        <li><a href="logout.php">Logout</a></li>
        <?php } else { ?>
          <li><a href="https://tro.tentoptoday.com/index.php">Home</a></li>
        <!--  <li><a href="payment_board.php">Energy Options</a></li>-->
        <!--  <li><a href="account.php">Account</a></li>-->
        <!--  <li><a href="javascript:void(0)" id="installApp" class="install-app-btn-container">Download</a></li>-->
        <!--<li><a href="logout.php">Logout</a></li>-->
        <?php } ?>
    </ul>
  </div>
</div>    
            </div>
            </div>
            </div>
            <!-- End Menu Bar -->