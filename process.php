<?php
//ini_set('display_errors',1);
//error_reporting(E_ALL);
//echo $_SERVER['REMOTE_ADDR'];

session_start();
$paymentMessage = '';
if(!empty($_POST['stripeToken'])){
    
	// get token and user details
    $stripeToken  = $_POST['stripeToken'];
    $customerName = $_POST['customerName'];
    $customerEmail = $_POST['emailAddress'];
	
	$customerAddress = $_POST['customerAddress'];
	$customerCity = $_POST['customerCity'];
	$customerZipcode = $_POST['customerZipcode'];
	$customerState = $_POST['customerState'];
	$customerCountry = $_POST['customerCountry'];
	
    $cardNumber = $_POST['cardNumber'];
    $cardCVC = $_POST['cardCVC'];
    $cardExpMonth = $_POST['cardExpMonth'];
    $cardExpYear = $_POST['cardExpYear'];    
    
	//include Stripe PHP library
    require_once('stripe-php/init.php'); 
	
    //set stripe secret key and publishable key
    
 
    $stripe = array(
      "secret_key"      => "sk_test_51LCrEBJPfbfzje02NYceKQNcxkYCocbDdLhdwJ3xMxBpvzy9xmFYBzZ247lVepjce5RXb2Pb8xny6fSdiis1Ugtf00eVLsnICw",
      "publishable_key" => "pk_test_51LCrEBJPfbfzje02cGGuiKfWFTikU4sHdU7XN13cr0EzRRHRThNfecBFmI9wIzZ3WRaLJbA5IACZ5tU1kO3dpCUw007mxAvgeb"
     );    
    //     $stripe = array(
    //   "secret_key"      => "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",
    //   "publishable_key" => "pk_live_51LCrEBJPfbfzje02kM4bLe9H6mEIVNkpZwxrcNSNOA8TO0WyfSAcZhjPsCgG7pYuwdE1QjFzmd3bew2A2ch3lqCE00NG2kiGDs"
    // );  
    
    //  $stripe = array(
    //   "secret_key"      => "sk_test_51MGzTUSDEVtB59Eu9Ae70QJJRBmWi2q6UTNj8rm61wLJ7dtONAoSONZ92VpgK7o0pnFmLqRclHTQdWJhzaInh6dp00PsPMbLMx",
    //   "publishable_key" => "pk_test_51MGzTUSDEVtB59EuvCXeGZ4VNe0SEFTuOAmEERDKUF6h861PdpXJFiAkOVot29BUWQKmBpqnM8gUmC8FWvtZb2hi00kGloztvw"
    // ); 
	
    \Stripe\Stripe::setApiKey($stripe['secret_key']);    
    
	//add customer to stripe
    $customer = \Stripe\Customer::create(array(
		'name' => $customerName,
		'description' => 'TRO Energy Solution',
        'email' => $customerEmail,
        'source'  => $stripeToken,
		"address" => ["city" => $customerCity, "country" => $customerCountry, "line1" => $customerAddress, "line2" => "", "postal_code" => $customerZipcode, "state" => $customerState]
    ));  
	
    // item details for which payment made
	$itemName = $_POST['item_details'];
	$itemNumber = $_POST['item_number'];
	$itemPrice = $_POST['price'];
// 	$itemPricepoint = $_POST['price']/100;
	$totalAmount = $_POST['total_amount'];
	$currency = $_POST['currency_code'];
	$orderNumber = $_POST['order_number'];   
    
    // details for which payment performed
    $payDetails = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $totalAmount,
        'currency' => $currency,
        'description' => $itemName,
        'metadata' => array(
            'order_id' => $orderNumber
        )
    ));   
	
    // get payment details
    $paymenyResponse = $payDetails->jsonSerialize();
	
    // check whether the payment is successful
    if($paymenyResponse['amount_refunded'] == 0 && empty($paymenyResponse['failure_code']) && $paymenyResponse['paid'] == 1 && $paymenyResponse['captured'] == 1){
        
		// transaction details 
        $amountPaid = $paymenyResponse['amount'];
        $balanceTransaction = $paymenyResponse['balance_transaction'];
        $paidCurrency = $paymenyResponse['currency'];
        $paymentStatus = $paymenyResponse['status'];
        $paymentDate = date("Y-m-d H:i:s");        
       
	   //insert tansaction details into database
		include_once("dbConnECTT.php");
       
	   $insertTransactionSQL = "INSERT INTO transaction(cust_name, cust_email, card_number, card_cvc, card_exp_month, card_exp_year,item_name, item_number, item_price, item_price_currency, paid_amount, paid_amount_currency, txn_id, payment_status, created, modified) 
		VALUES('".$customerName."','".$customerEmail."','".$cardNumber."','".$cardCVC."','".$cardExpMonth."','".$cardExpYear."','".$itemName."','".$itemNumber."','".$itemPrice."','".$paidCurrency."','".$amountPaid."','".$paidCurrency."','".$balanceTransaction."','".$paymentStatus."','".$paymentDate."','".$paymentDate."')";

        $session_mail = $_SESSION['email_verified'];
        $sqlupdate = "UPDATE `pwa_registration` SET `energy_plan`='".$_POST['item_details']."',pwa_status=1,`strip_id`='".$customer->id."',`energy_price`='".$_POST['price']."' WHERE pwa_email='$session_mail'";
        mysqli_query($con, $sqlupdate);
		
		mysqli_query($con, $insertTransactionSQL) or die("database error: ". mysqli_error($con));
       
	   $lastInsertId = mysqli_insert_id($con); 
       
	   //if order inserted successfully
       if($lastInsertId && $paymentStatus == 'succeeded'){
            $paymentMessage = "The payment was successful. Order ID: {$orderNumber}";
       } else{
          $paymentMessage = "failed";
       }
	   
    } else{
        $paymentMessage = "failed";
    }
} else{
    $paymentMessage = "failed";
}
$_SESSION["message"] = $paymentMessage;
header('location:congratulation.php');
exit();
