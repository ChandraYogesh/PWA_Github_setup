<?php
// include('header.php');
$con = mysqli_connect("localhost","cvinfote_tro_tentop","pwa@1234567890","cvinfote_tro_tentop");
$choice_id='';
if(isset($_POST['choice_id'])){
$choice_id = $_POST['choice_id'];
}
$sql_location = mysqli_query($con,"select * from prices where id='".$choice_id."'");
$sql_loc_array=mysqli_fetch_array($sql_location);
echo json_encode($sql_loc_array);
die();