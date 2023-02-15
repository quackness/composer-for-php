<?php
require __DIR__ . '/vendor/autoload.php';

$global_start = microtime(true);
$global_end = microtime(true);

echo "Full page loaded in: " . round($global_end - $global_start, 2) . " seconds";