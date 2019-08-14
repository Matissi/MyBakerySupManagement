<?php

session_start();
  require_once 'dbconnect.php';
  require_once 'header.php';
  
 $res= 'UPDATE orders SET paid=1 WHERE order_id='.$_GET['id'];

$curl = curl_init();
$reference = isset($_GET['reference']) ? $_GET['reference'] : '';
if(!$reference){
  die('No reference supplied');
}

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "authorization: Bearer sk_test_6bb09d5b6037bbace6646f399bded87609dcf93c",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
    // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response);

if(!$tranx->status){
  // there was an error from the API
  die('API returned error: ' . $tranx->message);
}


if('success' == $tranx->data->status){
 if(mysqli_query($conn,$res)){
 echo "<h2>The order ".$_GET['code']." have been paid to ".$_GET['sup'].
         ". The transaction details  has been sent to the inbox of the supplier .</h2>";
 echo "<a href='orders_information.php' >Return to the dashborad</a>";
 }

}


?>
