<?php
require_once(__DIR__ . '/vendor/autoload.php' );

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('172.19.0.2', 5672, 'root', 'root');
$channel = $connection->channel();

$channel->queue_declare('task_queue', false, true, false, false);

echo " [*] Waiting for messages. To exit press CTRL+C\n";

$callback = function (AMQPMessage $msg) {
    echo ' ['.date("d-m-Y H:i:s").'] Received '. $msg->body, "\n";
    $msg->ack();
};

$channel->basic_qos(null, 1, null);
$channel->basic_consume('task_queue', '', false, false, false, false, $callback);


while($channel->is_consuming()) {
    $channel->wait();
}

$channel->close();
$connection->close();
