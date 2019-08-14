<?php


session_start();
  require_once 'dbconnect.php';
  require_once 'header.php';
  
$curl = curl_init();

$reso=mysqli_query($conn,"SELECT * from orders where order_id=".$_GET['order_id']);
$ress=mysqli_query($conn,"SELECT * from suppliers where supplier_id=".$_GET['sup_id']);
 $supplierRow=mysqli_fetch_array($ress,MYSQLI_ASSOC);
 $orderRow=mysqli_fetch_array($reso,MYSQLI_ASSOC);

// url to go to after payment
$callback_url = 'https://localhost/myBakerySupManagement/production/callback.php?id='.$orderRow['order_id'].'&code='.$orderRow['code'].'&sup='.$supplierRow['name'];  

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$orderRow['bill']*100,
    'email'=>$supplierRow['email'],
    'callback_url' => $callback_url
  ]),
  CURLOPT_HTTPHEADER => [
    "authorization: Bearer sk_test_6bb09d5b6037bbace6646f399bded87609dcf93c", //replace this with your own test key
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response, true);

if(!$tranx->status){
  // there was an error from the API
  print_r('API returned error: ' . $tranx['message']);
}

// comment out this line if you want to redirect the user to the payment page
print_r($tranx);
// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $tranx['data']['authorization_url']);
