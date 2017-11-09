<?php

require_once __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Response;

$api_key = getenv('OPEN_WEATHER_API');

$app = new Silex\Application();

$app->get('/', function() use($app,$api_key) {
    
	$var1 = $_GET['var1'];
	$var2 = $_GET['var2'];
	$latitude = $var1;
	$longitude = $var2;
	$url = "http://api.openweathermap.org/data/2.5/weather?lat=$latitude&lon=$longitude&appid=$api_key&units=metric";
	$client = new Client();
	$response = $client -> get($url);
	$body = $response -> getBody();

	return new Response($body,200,array('Content-Type' => 'application/json'));
});

$app->run();
?>