
<?php
require 'vendor/autoload.php';
$config = require 'config.php';

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
$cidade = $_POST['cidade'];
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

$weather = json_decode($response->getBody(), true)['main'];
$name = json_decode($response->getBody(), true);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" type="text/css" href="bootstrap.css">
<link rel="stylesheet" type="text/css"  href="estilo.css" />

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Weather Search</title>
</head>
<body>

<br><br><br>

<div class="container">

<form action="weather.php" method="post">
  <h1><?php echo "<br>Cidade: {$name['name']}"; ?> </h1>

  <br><br>


  <section>
 <div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3>Temperatura Agora</h3>
      <p style= "font-size: 50px"><?php echo "<br> {$weather['temp']} ºC"; ?></p>
    </div>
    <div class="col-sm-4">
      <h3>Temperatura Mínima</h3>
      <p style= "font-size: 50px"><?php echo "<br> {$weather['temp_min']} ºC"; ?></p>
    </div>
    <div class="col-sm-4">
      <h3>Temperatura Máxima</h3>
      <p style= "font-size: 50px"><?php echo "<br>{$weather['temp_max']} ºC"; ?> </p>
    </div>
  </div>
</div>

  </section>
<br><br><br><br>

  <div class="footer">

       <p>Trabalho Prático I de Sistemas Distribuídos - Web Services</p>

   </div>

  </div>

</body>

</html>
