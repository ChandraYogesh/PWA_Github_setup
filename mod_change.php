<?php


$device_id='D2232A0004349454CEAB68'; 
$curl = curl_init();
$set_charge=true;
if($_REQUEST['set_charge']==1)
   $url= "http://3.85.30.147:8080/webapi/webapi/pwa/v2/setcharger?set_charger=true&device_id=".$device_id;
else
$url= "http://3.85.30.147:8080/webapi/webapi/pwa/v2/setcharger?set_charger=false&device_id=".$device_id;
//echo $url;
curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
));

$response = curl_exec($curl);

curl_close($curl);

echo $response;