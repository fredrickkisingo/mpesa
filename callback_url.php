<?php
$callbackResponse = file_get_contents('php://input');

$logFile = "CallbackResponse.txt";
$log = fopen($logFile, "a");
fwrite($log,$callbackResponse);
fclose($log);



