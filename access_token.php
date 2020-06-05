<?php
  //generate access token
  $headers = ['Content-Type:application/json; charset=utf8'];
  $consumerKey = 'cmpBRATxrSfzCtnZKFnXzE6lAI7LAUj2';
  $consumerSecret = 'hIuzlG9GkklcT5NN';
  $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
  $curl = curl_init($access_token_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($curl, CURLOPT_HEADER, FALSE);
  curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
  $result = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  curl_close($curl);
  $result = json_decode($result);
  $access_token = $result->access_token; 
   
 echo($access_token);
 
  ?>
  