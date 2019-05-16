<pre><?php

// echo time();exit;

$ch = curl_init();
$clientId = "ASyZxhZ6NjGMdcRQ1fZrZBBbvEiMtneEnEFUKvpsKVRJdKOTd5moanMRlVKJF-tFQbjj6q4vrTUzz4pI"; //client Id
$secret = "EAuZvBApenuNJLeZ4y6SFjNq5y3aDomO6fkkeDiCjpZdCDtaKQayTrHG_zOwpBxBy47sq5pqzMSM5OpI";// client secrete key
curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $clientId . ":" . $secret);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
$result = curl_exec($ch);
$accessToken = null;
if (empty($result))
   die('invalid access token');
else {
    $json = json_decode($result);
    $accessToken = $json->access_token;
}
curl_close($ch);
var_dump($accessToken);


 $curl = curl_init("https://api.sandbox.paypal.com/v1/payments/payment/0XH84539XS3813645");
            curl_setopt($curl, CURLOPT_POST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $accessToken,
                'Accept: application/json',
                'Content-Type: application/json'
            ));
            $response = curl_exec($curl);
            $result = json_decode($response);
var_dump($response);
var_dump($result);
