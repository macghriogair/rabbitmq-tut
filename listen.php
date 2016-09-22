<?php

require_once __DIR__ . '/vendor/autoload.php';

use Macghriogair\Broker\Consumer;

$channel = 'hello';
$consumer = new Consumer();
$consumer->connect();
$consumer->setupChannel('hello');
$consumer->listen($channel);
