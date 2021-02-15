<?php
    namespace Mutant;

    use Mutant\Contracts\ISubscriber;
    use Mutant\Contracts\AbstractPublisher;

    class EventPublisher extends AbstractPublisher {

        protected static EventPublisher $instance;

        private function __construct(){}

        public static function getInstance() {
            if(!isset(self::$instance)) {
                self::$instance = new EventPublisher();
            }
            return self::$instance;
        }

        public function addSubscriber(ISubscriber $subscriber){
            $this->subscribers[] = $subscriber;
        }

        public function removeSubscriber(ISubscriber $subscriber){
            foreach($this->subscribers as $key => $item) {
                if(get_class($item) == get_class($subscriber)) {
                    unset($this->subscribers[$key]);
                    array_values($this->subscribers);
                }
            }
        }
    }
