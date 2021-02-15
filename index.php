<?php
require __DIR__ . '/vendor/autoload.php';

use Mutant\EventPublisher;
use Mutant\Editor;
use Mutant\EmailLoggerSubscriber;
use Mutant\FileLoggerSubscriber;

$publisher = EventPublisher::getInstance();
$publisher->addSubscriber(new FileLoggerSubscriber("FileOpenedEvent"));
$publisher->addSubscriber(new FileLoggerSubscriber("FileSavedEvent"));
$publisher->addSubscriber(new EmailLoggerSubscriber("FileSavedEvent"));

$editor = new Editor("/etc/apache.conf", $publisher);

$editor->openFile();
$editor->saveFile();
