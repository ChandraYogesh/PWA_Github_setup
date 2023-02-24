<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- MDB -->
<script  type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
<script src="custom_js.js"></script>
<script src="custom_jsvk21.js"></script>
<?php
// if(isset($check)) {
// if($check!=1)
//        {
   ?>
<?php $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// echo $actual_link;
if($actual_link!="https://tro.tentoptoday.com/payment_board_2.php" && $actual_link!="https://tro.tentoptoday.com/pwa_payment.php") {
 ?>   
       <script src="js/apppwa.js"></script>
<?php } ?>
<style>
.errorClass {
    border: 1px solid #ff0000!important;
    background-color: rgba(255, 255, 255, 0.1)!important;
} 

.form-control{caret-color: #fff;}
</style>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}  
</script>
</body>
</html>