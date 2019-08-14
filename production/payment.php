<?php

session_start();
  require_once 'dbconnect.php';
  require_once 'header.php';
  require __DIR__. "/../paystackAPI/src/autoload.php";
?>
<?php
/*$reso=mysqli_query($conn,"SELECT * from orders where order_id=".$_GET['order_id']);
$ress=mysqli_query($conn,"SELECT * from suppliers where supplier_id=".$_GET['sup_id']);
 $supplierRow=mysqli_fetch_array($ress,MYSQLI_ASSOC);
 $orderRow=mysqli_fetch_array($reso,MYSQLI_ASSOC);
 * 
 */

$paystack = new Yabacon\Paystack('sk_test_6bb09d5b6037bbace6646f399bded87609dcf93c');
//var_dump($supplierRow);
    try
    {
        
      $tranx = $paystack->transaction->initialize([
        'amount'=>1000,       // in kobo
        'email'=>"hbjkjbkj",         // unique to customers
        'reference'=>'', // unique to transactions
      ]);
    } catch(\Yabacon\Paystack\Exception\ApiException $e){
      print_r($e->getResponseObject());
      die($e->getMessage());
    }

    // store transaction reference so we can query in case user never comes back
    // perhaps due to network issue
   save_last_transaction_reference($tranx->data->reference);

    // redirect to page so User can pay
  header('Location: ' . $tranx->data->authorization_url);
 
?>