<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

// Create client with base URI
$client = new Client(['base_uri' => 'https://api.sunrise-sunset.org/']);

// Send the request to server.
$response = $client->request(
  'GET',
  'json',
  [
    'query'  => ['lat' => '-18.24', 'lng' => '-43.60']
  ]
);


echo "Request status code: {$response->getStatusCode()}\n";

// Transform json response in PHP array
$sunrise = json_decode($response->getBody(), true)['results'];

echo "Sunrise in Diamantina today: {$sunrise['sunrise']}\n";

echo "\nSunset in Diamantina today: {$sunrise['sunset']}";

echo "Day lenght: {$sunrise['day_length']}\n";

?>
