<?php
// include('header.php');
$con = mysqli_connect("localhost","cvinfote_tro_tentop","pwa@1234567890","cvinfote_tro_tentop");
$location_id = $_POST['location_id'];
$sql_location = mysqli_query($con,"SELECT `ZIP_code`,`state` FROM `locations` where id='".$location_id."'");
$sql_loc_array=mysqli_fetch_array($sql_location);
echo json_encode($sql_loc_array);
die();