<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Macghriogair\Broker\Consumer;

$channel = 'logs';
$consumer = new Consumer();
$consumer->connect();
$consumer->setupExchangeChannel($channel);
$consumer->listen($channel);

//comment
