<?php

$f_pbk = 'cDM2EwfA3Xi7IEfOmlyjP1q0uKIa72wLZs6we7DtJYoI9JzK76i6ssh6SVlMhkyA';
$f_prk = 'pkZwITrKH4g88nafFlhEH5klYHeVQ7kKqmCVUhA5wicWZvMY0dHFB4b5UsW1tCGuRTWFLzU8eq5V5wC7F0bLQTrf3bPqNUurWkf3mZNeAU6tSTGZHX7Qn6e2xjUmISoAACuwDXqTDXuBh2ak4sp99Au6UO7TWQysAC9BGputkxqXa36vCTyEcNYi8LO9XYCgaTdD8gsDMPy1LAfLylOC730XYVliLGuhWRvZ56CH7iK6GfwwPOv6nDz1ANfknjcQ';


// $response = Curl::to('https://fuelgram.com/dev/api/me/')
//     ->withHeader('X-Signature: ' . $f_pbk . '&' . $f_prk)
//     ->get();

// $response = Curl::to('https://fuelgram.com/dev/api/clients/' . $f_pbk . '/accounts/')
//     ->withHeader('X-Signature: ' . $f_pbk . '&' . $f_prk)
//     ->get();

// $response = Curl::to('https://fuelgram.com/dev/api/clients/' . $f_pbk . '/receivers/')
//     ->withHeader('X-Signature: ' . $f_pbk . '&' . $f_prk)
//     ->get();


$response = Curl::to('https://fuelgram.com/dev/api/product-types/')
    ->withHeader('X-Signature: ' . $f_pbk . '&' . $f_prk)
    ->asJson()
    ->get();
?><pre><?
foreach ($response as $key => $value) {
	var_dump($key, $value);
}

return ;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://fuelgram.com/dev/api/me/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    'X-Signature: cDM2EwfA3Xi7IEfOmlyjP1q0uKIa72wLZs6we7DtJYoI9JzK76i6ssh6SVlMhkyA&pkZwITrKH4g88nafFlhEH5klYHeVQ7kKqmCVUhA5wicWZvMY0dHFB4b5UsW1tCGuRTWFLzU8eq5V5wC7F0bLQTrf3bPqNUurWkf3mZNeAU6tSTGZHX7Qn6e2xjUmISoAACuwDXqTDXuBh2ak4sp99Au6UO7TWQysAC9BGputkxqXa36vCTyEcNYi8LO9XYCgaTdD8gsDMPy1LAfLylOC730XYVliLGuhWRvZ56CH7iK6GfwwPOv6nDz1ANfknjcQ'
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
} 
dd();


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://fuelgram.com/dev/api/me/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    'X-Signature: ' . $f_pbk. '&' . $f_prk 
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
} 
dd();


	$response = Curl::to('https://fuelgram.com/dev/api/me/')
        ->withContentType('application/json')
        ->withHeader( 'X-Signature: ' . $f_pbk. '&' . $f_prk )
        ->asJson()
        ->get();

        dd($response);

$curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => "https://fuelgram.com/dev/api/products/",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => false,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "GET",
//   CURLOPT_HTTPHEADER => array(
//     "Content-Type: application/json"
//   ),
// ));

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//   echo "cURL Error #:" . $err;
// } else {
//   echo $response;
// }

dd(__LINE__);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://fuelgram.com/dev/api/clients/public_key/accounts/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n\t\"username\":account_username,\n\t\"password\":account_password\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    'X-Signature: ' . $f_pbk. '&' . $f_prk 
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo  '$response: ' .$response;
}

dd(__LINE__);