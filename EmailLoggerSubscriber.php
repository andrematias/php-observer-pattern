<?php
    namespace Mutant;

    use Mutant\Contracts\ISubscriber;
    use Mutant\Contracts\IEvent;

    final class EmailLoggerSubscriber implements ISubscriber {

        private string $eventName;

        public function __construct(string $eventName){
            $this->eventName = $eventName;
        }

        public function update(IEvent $event) {
            echo "[*] ".static::class." divulgando o evento ".$this->eventName." localmente.\n";
            echo $event->serialize();
        }

        public function eventName(){
            return $this->eventName;
        }
    }
