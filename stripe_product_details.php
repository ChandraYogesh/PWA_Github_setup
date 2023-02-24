<?php
$stripe_prid = $_POST['product_idd'];

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.stripe.com/v1/products/'.$stripe_prid.'',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer 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'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
// $response2=json_decode($response, true);
print_r($response);