<?php
    namespace Mutant;

    use Mutant\Contracts\ISubscriber;
    use Mutant\Contracts\IEvent;
    use Mutant\Contracts\IBus;

    final class RabbitMqEventSubscriber implements ISubscriber {

        private string $eventName;
        private IBus $bus;

        public function __construct(string $eventName, IBus $bus){
            $this->eventName = $eventName;
            $this->bus = $bus;
        }

        public function update(IEvent $event) {
            echo "[*] ".static::class." disparando mensagem ".$this->eventName." para o RabbitMq.\n";
            $this->bus->publishMessage($event->serialize());
        }

        public function eventName(){
            return $this->eventName;
        }
    }
