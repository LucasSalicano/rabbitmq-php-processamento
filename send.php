<?php

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

require_once __DIR__ . '/vendor/autoload.php';

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false);
$msg = new AMQPMessage('Hello RabbitMQ');

for ($x = 1; $x <= 10; $x++) {
    $channel->basic_publish($msg, '', 'hello');
    sleep(rand(1, 4));
}

$channel->close();
$connection->close();