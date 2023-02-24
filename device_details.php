<?php
if(isset($_POST['plan_id'])) {
$timeperiod = trim($_POST['plan_id']);
}
if(isset($_POST['email_id'])) {
    if($_POST['email_id']=='chetansoun2008@gmail.com') {
        $device_id='D2131A0D048C4B14091260';    
    } else {
      $device_id='D2232A0004349454CEAB68';     
    }
}
 $device_id='D2232A0004349454CEAB68'; 
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://3.85.30.147:8080/webapi/webapi/pwa/v2/?time_period=".$timeperiod."&device_id=".$device_id."",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;