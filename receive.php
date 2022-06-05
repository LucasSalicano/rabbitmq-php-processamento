<?php

use PhpAmqpLib\Connection\AMQPStreamConnection;

require_once __DIR__ . '/vendor/autoload.php';

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false);

echo '[*] Received for messages. To exit press CTRL+C', "\n";

$callback = function ($msg) {
    echo "[X] Received ", $msg->body, "\n";
};

$channel->basic_consume('hello', '', false, true, false, false, $callback);

while (sizeof($channel->callbacks)) {
    $channel->wait();
}

$channel->close();
$connection->close();