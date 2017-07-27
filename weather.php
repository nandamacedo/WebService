
<?php


require 'vendor/autoload.php';
$config = require 'config.php';

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
$cidade = "London";
$client = new Client(['base_uri' => $config['base_uri']]);
$queryParams = [
  'q'=> $cidade,
  'appid' => $config['appid'],
  'units' => 'metric'
];

$response = $client->request(
   'GET',
   'data/2.5/weather',
  [
    RequestOptions::QUERY => $queryParams
  ]
);

//var_dump($response->getStatusCode());
$weather = json_decode($response->getBody(), true)['main'];
echo "Cidade: {$cidade}";
echo "<br>Temperatura Ambiente: {$weather['temp']} ºC";
echo "<br>Temperatura Mínima:  {$weather['temp_min']} ºC";
echo "<br>Temperatura Máxima: {$weather['temp_max']} ºC";

?>
