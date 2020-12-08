<?php
  

   //cmpBRATxrSfzCtnZKFnXzE6lAI7LAUj2
   //hIuzlG9GkklcT5NN
  

//urls
$access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$b2c_url = 'https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';

//variables
$consumerKey = 'wdykjM693gdgMmzHOGAdA4A50fGsTPM7';
$consumerSecret = 'iiGI1SzEyJscEETW';
$headers = ['Content-Type:application/json; charset=utf8'];


$InitiatorName ='apiop37';
$SecurityCredential ='XJxCEXi/ZZiQJDTRJe/zTipE9Nq9ZsLgPMekwNti0Tna0BmII3jcOuNmex7JPKJYcAHXwaX+V6Gwe/61Oku4OSAfYDQH9zV5y515Qo/zCBNRUysf478+JydFE7p9GC2KXaE18cl+xbDHx/Rn/c+toBA3JpGYQygimB+gclDAnvjUnPpkDzCoWIOdupdQqBGcXmfXIqztop6S4bx8C7TDf5CBGorAeewGiIa+/rn38Pu3QG6wirOIAFKnRhCAtdY0km9dzr+lmhDjVbx+oxRvUVSSYBjla3QzisVv45ihDKB9INeCWG2nVxXd/oqTf3vWpizd5nd61dBail0VhKe0ag==';
$CommandID ='Salarypayment';
$Amount = '2500';
$PartyA = '603021';
$PartyB = '254708374149';
$Remarks = 'Salary';
$QueueTimeOutURL ='http://pesaern.com/MPESA_API/callback_url.php';
$ResultURL= 'http://pesaern.com/MPESA_API/callback_url.php';
$Occasion = 'Salary  November 2020 ';

//generate access token

$curl = curl_init($access_token_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_HEADER, FALSE);
curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
$result = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$result = json_decode($result);
$access_token = $result->access_token;  
//echo($access_token);
curl_close($curl);

//main request
$b2cheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token]; //setting custom header

  
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $b2c_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $b2cheader);
  
  
  $curl_post_data = array(
    //Fill in the request parameters with valid values
    'InitiatorName' => $InitiatorName,
    'SecurityCredential' => $SecurityCredential,
    'CommandID' => $CommandID,
    'Amount' => $Amount,
    'PartyA' => $PartyA,
    'PartyB' => $PartyB,
    'Remarks' => $Remarks ,
    'QueueTimeOutURL' => $QueueTimeOutURL,
    'ResultURL' => $ResultURL,
    'Occasion' =>$Occasion
  );
  
  $data_string = json_encode($curl_post_data);
  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
  
  $curl_response = curl_exec($curl);
  print_r($curl_response);
  
  echo $curl_response;
  ?>