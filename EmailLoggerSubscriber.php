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
            $eventName = get_class($event);
            echo "EmailLoggerSubscriber se inscreveu para o evento {$eventName} e pode fazer o que quiser \n\n";
        }

        public function eventName(){
            return $this->eventName;
        }
    }
