<?php
    namespace Mutant\Events;

    use Mutant\Contracts\IEvent;

    final class FileSavedEvent implements IEvent {

        private string $filename;

        public function __construct(string $filename) {
            $this->filename = $filename;
        }

        public function serialize()
        {
            return "Evento FileSavedEvent serializado com o arquivo {$this->filename}\n";
        }
    }
