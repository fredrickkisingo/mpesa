<?php
  require 'access_token.php'; //to get access_token variable from the named file
  date_default_timezone_set('Africa/Nairobi');

  # access token
  $consumerKey = 'wdykjM693gdgMmzHOGAdA4A50fGsTPM7';
  $consumerSecret = 'iiGI1SzEyJscEETW';

 //credentials 
  $BusinessShortCode = '174379';
  $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';   
  $PartyA = '254791916858'; // This is your phone number, 
  $AccountReference = 'Kisingo';
  $TransactionDesc = 'Cart Payment';
  $Amount = '1';
  $Timestamp = date('YmdHis');  //20181004151020   
  $Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp); //encode these variables 

  # header for access token
  $headers = ['Content-Type:application/json; charset=utf8'];

    # M-PESA endpoint urls
  $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest'; 
  $CallBackURL = 'https://fb819b0b5a9c.ngrok.io/mpesa/callback_url.php'; //define your call back url

  # header for stk push
  $stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];

  # initiating the transaction
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $initiate_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header

  $curl_post_data = array(
    //Fill in the request parameters with valid values
    'BusinessShortCode' => $BusinessShortCode,
    'Password' => $Password,
    'Timestamp' => $Timestamp,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' => $Amount,
    'PartyA' => $PartyA,
    'PartyB' => $BusinessShortCode,
    'PhoneNumber' => $PartyA,
    'CallBackURL' => $CallBackURL,
    'AccountReference' => $AccountReference,
    'TransactionDesc' => $TransactionDesc
  );

  $data_string = json_encode($curl_post_data);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
  $curl_response = curl_exec($curl);
  // print_r($curl_response); //prints the response
 // $response  = json_decode($curl_response);

    
             

  // echo $curl_response;//prints the response
  echo('Mpesa Push coming underway!');
?>