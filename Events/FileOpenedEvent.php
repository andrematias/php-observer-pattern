<?php
    namespace Mutant\Events;

    use Mutant\Contracts\IEvent;

    final class FileOpenedEvent implements IEvent {

        private string $filename;

        public function __construct(string $filename) {
            $this->filename = $filename;
        }

        public function serialize()
        {
            echo "Evento OpenFileEvent serializado com o arquivo {$this->filename}";
        }
    }
