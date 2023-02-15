<?php
require __DIR__ . '/vendor/autoload.php';

$global_start = microtime(true);
$global_end = microtime(true);

echo "Full page loaded in: " . round($global_end - $global_start, 2) . " seconds";

function request_endpoint($client, $url) {
  echo "Requesting URL: $url...";
  $start = microtime(true);
  $response = $client->request('GET', $url);
  $end = microtime(true);

  echo $response->getBody();
  echo "</br>Request completed in: " . round($end - $start, 2) . " 
        seconds</br></br>";

}