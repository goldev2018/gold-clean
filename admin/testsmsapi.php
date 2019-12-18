<?php 

$ch = curl_init();
$parameters = array(
    'apikey' => 'e5e8d303cf560e9a536c32315499d13b', //Your API KEY
    'number' => '09957336502',
    'message' => 'I just sent my first message with Semaphore',
    'sendername' => 'Gold PH'
);
curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
curl_setopt( $ch, CURLOPT_POST, 1 );

//Send the parameters set above with the request
curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

// Receive response from server
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$output = curl_exec( $ch );
curl_close ($ch);

//Show the server response
echo $output;
                    

 ?>