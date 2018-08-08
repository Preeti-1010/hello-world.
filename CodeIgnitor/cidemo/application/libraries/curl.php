<?php

//----------Retrieve-------//

    //API URL
$url = 'http://localhost/codeigniter/api/example/user/';

//API key
$apiKey = 'CODEX@123';

//Auth credentials
$username = "admin";
$password = "1234";

//create a new cURL resource
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");

$result = curl_exec($ch);

//close cURL resource
curl_close($ch); 

//----------Insert-------//

//API URL
$url = 'http://localhost/codeigniter/api/example/user/';

//API key
$apiKey = 'CODEX@123';

//Auth credentials
$username = "admin";
$password = "1234";

//user information
$userData = array(
    'first_name' => 'John',
    'last_name' => 'Doe',
    'email' => 'john@example.com',
    'phone' => '123-456-7890'
);

//create a new cURL resource
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $userData);

$result = curl_exec($ch);

//close cURL resource
curl_close($ch);


//---------Update------//

//API URL
$url = 'http://localhost/codeigniter/api/example/user/';

//API key
$apiKey = 'CODEX@123';

//Auth credentials
$username = "admin";
$password = "1234";

//user information
$userData = array(
    'id' => 2,
    'first_name' => 'John2',
    'last_name' => 'Doe2',
    'email' => 'john2@example.com',
    'phone' => '098-765-4321'
);

//create a new cURL resource
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: '.$apiKey, 'Content-Type: application/x-www-form-urlencoded'));
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($userData));

$result = curl_exec($ch);

//close cURL resource
curl_close($ch);


//----delete------//

//API URL
$url = 'http://localhost/codeigniter/api/example/user/2';

//API key
$apiKey = 'CODEX@123';

//Auth credentials
$username = "admin";
$password = "1234";

//create a new cURL resource
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

$result = curl_exec($ch);

//close cURL resource
curl_close($ch);