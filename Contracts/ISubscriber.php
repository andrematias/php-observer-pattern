<?php
    namespace Mutant\Contracts;

    interface ISubscriber {
        public function update(IEvent $event);
    }
