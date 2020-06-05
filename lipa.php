<?php
 require 'access_token.php'; 
 date_default_timezone_set('Africa/Nairobi');


//access token 
$consumerKey= 'cmpBRATxrSfzCtnZKFnXzE6lAI7LAUj2';
$consumerSecret='hIuzlG9GkklcT5NN';

//credentials
 $BusinessShortCode = '174379';
 $Timestamp = date('YmdHis'); //20200324
 $PartyA = '254791916858'; //Phone number
  $AccountReference = 'cart098'; //checkout id
 $Amount= '1';
 $TransactionDesc = 'Cart Payment for Online Service';
 $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
 
 $Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);
 $credentials = base64_encode($this->consumer_key.$this->consumer_secret);

 //header for access token
$headers = ['Content-Type:application/json; charset=utf8'];

//initiating the transaction
  $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
   $CallBackURL = 'https/facebook.com/callbackurl';

  //header for stk push
   $stkheader = ['Content-Type:application/json','Authorization:Bearer'.$access_token];


 $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $initiate_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header
  
  
  $curl_post_data = array(
    //Fill in the request parameters with valid values
    'BusinessShortCode' => $BusinessShortCode,
    'Password' => $Password,
    'Timestamp' =>  $Timestamp,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' => $Amount,
    'PartyA' =>  $PartyA,
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
 //print_r($curl_response);
  
   echo $curl_response;
 //echo('i am a working script!');
?>
  <!--  
$access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

$curl = curl_init($access_token_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($curl, CURLOPT_HEADER, FALSE);
curl_setopt($curl,CURLOPT_USERPWD,$consumerKey.':'.$consumerSecret);
$result = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$result = json_decode($result);
$access_token = $result->access_token;
curl_close($curl);-->





  



  

  