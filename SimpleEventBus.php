<?php
    namespace Mutant;

    use Mutant\Contracts\IBus;
    use PhpAmqpLib\Channel\AMQPChannel;
    use PhpAmqpLib\Connection\AMQPStreamConnection;
    use PhpAmqpLib\Message\AMQPMessage;

    final class SimpleEventBus implements IBus {

        private AMQPStreamConnection $amqConnection;
        private AMQPChannel $channel;
        private string $channelName;

        public function __construct(AMQPStreamConnection $amqConnection){
            $this->amqConnection = $amqConnection;
            $this->openChannel();
        }

        private function openChannel() {
            if(!is_null($this->amqConnection)) {
                $this->channel = $this->amqConnection->channel();
                return;
            }
            throw new \AssertionError("Rabbit MQ Connection required");
        }

        public function setQueue(string $queueName) {
            $this->channelName = $queueName;
            $this->channel->queue_declare($queueName, false, true, false, false);
        }

        public function publishMessage(string $message) {
            $this->channel->basic_publish(
                new AMQPMessage(
                    $message,
                    ['delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT]
                ), '', $this->channelName
            );
        }

        private function closeChannel() {
            $this->channel->close();
        }
    }
