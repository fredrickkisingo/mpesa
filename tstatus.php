<?php
/*access token */
$headers = ['Content-Type:application/json; charset=utf8'];
$consumerKey = 'wdykjM693gdgMmzHOGAdA4A50fGsTPM7';
$consumerSecret = 'iiGI1SzEyJscEETW';
$access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
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

/* making a request */
  $tstatus_url = 'https://sandbox.safaricom.co.ke/mpesa/transactionstatus/v1/query';
  
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $tstatus_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer ACCESS_TOKEN')); //setting custom header
  
  
  $curl_post_data = array(
    //Fill in the request parameters with valid values
    'Initiator' => '603021',
    'SecurityCredential' => 'Fm1vJSDG47wTBLiEXWZeyLrHsjiH4yyp7603Ga2zSoXP3GtXvUKkiqkIqZ5yI2u8xbqzDK5rc9oB0o6cHR3f3biIO+yr5ZsewaMBrpbSKu5GXEhk9n+U3FkOUYoEr9bl5pvoz6k4W+DVxI8dQu7z/psWtZ45RpmNruGkr6/BVP6xYRMGvQFZaHRTUx5ZCjndypSPWNcto5jRWitkUkQFfX3FV4Sk7YLusTrY4gWFUs5iiXtEgUbiMuTP3lz63M7NLejctoTTiKzlwk9jGvrAb6dq5vP7mQbzjSHFgxg8VA+dlhzU3cJpWSWxGiTawXQo2W00hjbKXxYH0pcu9LFE8w==',
    'CommandID' => 'TransactionStatusQuery',
    'TransactionID' => ' ',
    'PartyA' => ' ',
    'IdentifierType' => '1',
    'ResultURL' => 'https://ip_address:port/result_url',
    'QueueTimeOutURL' => 'https://ip_address:port/timeout_url',
    'Remarks' => ' ',
    'Occasion' => ' '
  );
  
  $data_string = json_encode($curl_post_data);
  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
  
  $curl_response = curl_exec($curl);
  print_r($curl_response);
  
  echo $curl_response;
  ?>
