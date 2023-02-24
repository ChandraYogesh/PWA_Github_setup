<?php
$con = mysqli_connect("localhost","cvinfote_tro_tentop","pwa@1234567890","cvinfote_tro_tentop");

if(isset($_POST['value']) && isset($_POST['location_id'])){
    $sql = "UPDATE prices SET kwh='{$_POST['value']}' WHERE location_id='{$_POST['location_id']}' && package_name='{$_POST['package_name']}'";
    if (mysqli_query($con, $sql)) {
     echo $_POST['value'] . ' ' . $_POST['location_id'] . ' ' . $_POST['package_name'] ;
    }
}
?>
