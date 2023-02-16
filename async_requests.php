<?php
require __DIR__ . '/vendor/autoload.php';

$global_start = microtime(true);

// $client = new GuzzleHttp\Utils();
$client = new GuzzleHttp\Client();

$promises = [
	'1' => $client->getAsync('https://www.facebook.com/karolina.dubaj.1'),
	'2' => $client->getAsync('https://www.facebook.com/andrew.redden'),
	'3' => $client->getAsync('https://www.facebook.com/grzegorz.dubaj.7'),
];
sleep(2);

$results = GuzzleHttp\Promise\Utils::unwrap($promises);


$results = GuzzleHttp\Promise\Utils::settle($promises)->wait();

echo $results['1']['value']->getBody() . '</br>';
echo $results['2']['value']->getBody() . '</br>';
echo $results['3']['value']->getBody() . '</br>';

$global_end = microtime(true);

echo "Full page loaded in: " . round($global_end - $global_start, 2) . " seconds";
