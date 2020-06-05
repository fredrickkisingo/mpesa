<?php
 $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'; 
 $curl = curl_init(); curl_setopt($curl, CURLOPT_URL, $url); 
 $credentials = base64_encode('cmpBRATxrSfzCtnZKFnXzE6lAI7LAUj2:hIuzlG9GkklcT5NN'); 
 curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials));

  //setting a custom header
   curl_setopt($curl, CURLOPT_HEADER, true); 
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); $curl_response = curl_exec($curl); 
  echo json_decode($curl_response); ?>



<?php

//access token 
$consumerKey= 'cmpBRATxrSfzCtnZKFnXzE6lAI7LAUj2';
$consumerSecret='hIuzlG9GkklcT5NN';

$headers = ['Content-Type:application/json; charset=utf8'];

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




curl_close($curl);
