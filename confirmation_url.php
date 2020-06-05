<?php
header("Content-Type: application/json");

$response = '{
    "ResultCode": 0,
    "ResultDesc":"Confirmation Received Successfully"   
}';

//DATA response from mpesa stream
$mpesaResponse = file_get_contents('php://input');

//log the response
$logFile = "M_PESAResponse.txt";
$jsonMpesaResponse= json_decode($mpesaResponse, true);

//write to file
$log = fopen($logFile, "a");

fwrite($log, $jsonMpesaResponse);
fclose($log);

echo $response;
?>

