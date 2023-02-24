<?php
$conn = mysqli_connect("localhost","cvinfote_tro_tentop","pwa@1234567890","cvinfote_tro_tentop");
//  date_default_timezone_set("America/Chicago");
 date_default_timezone_set('Asia/Kolkata');
$nowTime = date('Y-m-d'); //2023-02-18
if(isset($_POST['value']) && isset($_POST['location_id'])){
    $sql = "SELECT * FROM daily_use WHERE DATE(date) = CURDATE() AND location_id = '{$_POST['location_id']}'";
    $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
         $sqlupdate = "UPDATE daily_use SET daily_uses='{$_POST['value']}' WHERE location_id='{$_POST['location_id']}' && DATE(date) = CURDATE()";
         if(mysqli_query($conn, $sqlupdate)){
             echo "update";
         }
         else{
             echo "not updated";
         }
     }
     else{
        $sqlinsert = "INSERT INTO daily_use (daily_uses,location_id) VALUES ('{$_POST['value']}', '{$_POST['location_id']}')";
        if(mysqli_query($conn, $sqlinsert)){
         echo "insert";
        }
        else{
         echo "not insert";
        }
    }
}
else{
    echo "not set";
}



?>