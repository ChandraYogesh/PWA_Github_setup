<?php require('dbConnECTT.php');
if(isset($_POST['email_ids'])) {
// $pwa_email = mysqli_real_escape_string($con,$_POST['email_id']);
$email_id = $_POST['email_ids'];

$sql = "SELECT * FROM `pwa_registration` WHERE pwa_email='".$email_id."'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

   header("Content-type: application/json");
        echo json_encode(array('status' => 1, 'message' => 'emailid is exists'));
        exit();
} else {
 header("Content-type: application/json");
        echo json_encode(array('status' => 0, 'message' => 'emailid is not exists '));
        exit();

}
mysqli_close($con);
 } 
 else {
  header('location:https://tro.tentoptoday.com');
  exit();
}

?>