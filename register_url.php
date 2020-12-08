<?php
  

  $url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
  $access_token = '9OwXhaSHOjYg1pwNgekbYQ0Bs0Bc'; // check the mpesa_accesstoken.php file for this. No need to writing a new file here, just combine the code as in the tutorial.
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer'.$access_token)); //setting custom header
  
  // check the mpesa_accesstoken.php file for this. No need to writing a new file here, just combine the code as in the tutorial.
	// $shortCode = '174739'; // provide the short code obtained from your test credentials

	// /* This two files are provided in the project. */
	// $confirmationUrl = 'https://fb819b0b5a9c.ngrok.io/mpesa/confirmation_url.php'; // path to your confirmation url. can be IP address that is publicly accessible or a url
	// $validationUrl = 'https://fb819b0b5a9c.ngrok.io/mpesa/validationurl.php'; // path to your validation url. can be IP address that is publicly accessible or a url 
  
  $curl_post_data = array(
    //Fill in the request parameters with valid values
    'ShortCode' => 	'174739',
    'ResponseType' => 'Confirmed',
    'ConfirmationURL' => 	'https://fb819b0b5a9c.ngrok.io/mpesa/confirmation_url.php',
    'ValidationURL' => 'https://fb819b0b5a9c.ngrok.io/mpesa/validationurl.php'
  );
  
  $data_string = json_encode($curl_post_data);
  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
  
  $curl_response = curl_exec($curl);
  print_r($curl_response);
  
  echo $curl_response;
  ?>