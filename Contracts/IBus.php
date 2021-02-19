<?php

    namespace Mutant\Contracts;
    interface IBus {
        public function publishMessage(string $message);
    }
