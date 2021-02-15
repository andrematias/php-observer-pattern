<?php
    namespace Mutant\Contracts;

    abstract class AbstractPublisher {

        protected array $subscribers = [];

        public abstract function addSubscriber(ISubscriber $subscriber);

        public abstract function removeSubscriber(ISubscriber $subscriber);

        public function notifySubscriber(IEvent $event) {
            foreach($this->subscribers as $subscriber) {
                if("Mutant\\Events\\{$subscriber->eventName()}" === get_class($event)) {
                    $subscriber->update($event);
                }
            }
        }
    }

