<?php
require __DIR__ . '/vendor/autoload.php';

use Mutant\EventPublisher;
use Mutant\Editor;
use Mutant\EmailLoggerSubscriber;
use Mutant\FileLoggerSubscriber;
use Mutant\RabbitMqEventSubscriber;
use Mutant\SimpleEventBus;
use PhpAmqpLib\Connection\AMQPStreamConnection;

$simpleBus = new SimpleEventBus(new AMQPStreamConnection('172.19.0.2', 5672, 'root', 'root'));
$simpleBus->setQueue('task_queue');

$publisher = EventPublisher::getInstance();

$publisher->addSubscriber(new RabbitMqEventSubscriber("FileOpenedEvent", $simpleBus));
$publisher->addSubscriber(new RabbitMqEventSubscriber("FileSavedEvent", $simpleBus));

$publisher->addSubscriber(new FileLoggerSubscriber("FileOpenedEvent"));
$publisher->addSubscriber(new EmailLoggerSubscriber("FileSavedEvent"));

$editor = new Editor("/etc/apache.conf", $publisher);

$editor->openFile();
$editor->saveFile();

$simpleBus->closeChannel();
