<?php
// webhook.php
//
// Use this sample code to handle webhook events in your integration.
//
// 1) Paste this code into a new file (webhook.php)
//
// 2) Install dependencies
//   composer require stripe/stripe-php
//
// 3) Run the server on http://localhost:4242
//   php -S localhost:4242


require 'vendor/autoload.php';
$payload = @file_get_contents('php://input');
$payload1=json_decode($payload,true);

$data=$payload1['data']['object'];

$payment_method_options=$payload1['data']['object']['payment_method_options'];
$itemPrice=$payment_method_options['card']['mandate_options']['amount'];
$itemName=$payment_method_options['card']['mandate_options']['description'];
$reference=$payment_method_options['card']['mandate_options']['reference'];
$single_refrence=explode("-",$reference);

$rf=trim($single_refrence[0]);

$amountPaid=$data['amount'];
$paidCurrency=$data['currency'];
$customer=$data['customer'];
 $transection=$data['charges']['data'][0];
 $txn         =$transection['balance_transaction'];
 $card         =$transection['payment_method_details']['card'];
  $cardExpMonth  =$card['exp_month'];
  $cardExpYear  =$card['exp_year'];
  $cardNumber=$card['last4'];
 $billing_details         =$transection['billing_details'];
  
$customerName=$billing_details['name'];
$customerEmail=$billing_details['email'];
 $currency        =$transection['currency'];

$country=$billing_details['address']['country'];

   $paymentDate = date("Y-m-d H:i:s");        
       
include("dbConnECTT.php");

 if($payload1['type']=='payment_intent.succeeded')
 $paymentStatus='succeeded';
 
 
echo $insertTransactionSQL = "INSERT INTO transaction(cust_name, cust_email, card_number, card_cvc, card_exp_month, card_exp_year,item_name,cust_refrence, item_number, item_price, item_price_currency, paid_amount, paid_amount_currency, txn_id, payment_status, created, modified) 
VALUES('".$customerName."','".$customerEmail."','".$cardNumber."','".$cardCVC."','".$cardExpMonth."','".$cardExpYear."','".$itemName."',  '".$rf."', '".$itemNumber."','".$itemPrice."','".$paidCurrency."','".$amountPaid."','".$paidCurrency."','".$txn."','".$paymentStatus."','".$paymentDate."','".$paymentDate."')";
mysqli_query($con, $insertTransactionSQL) or die("database error: ". mysqli_error($con));


$ab.= "Amount:".$amount."<br/>";
$ab.=  "Currency:".$currency."<br/>";
$ab.= "Amount:".$amount."<br/>";
$ab.=  "Customer:".$customer."<br/>";
$ab.=  "Tranction:".$txn."<br/>";
$ab.=  "Name:".$name."<br/>";
$ab.=  "Email:".$email."<br/>";
file_put_contents('./log12_'.date("j.n.Y").'.log', print_r($payload1,true), FILE_APPEND);
http_response_code(200);

