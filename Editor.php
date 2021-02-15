<?php
    namespace Mutant;
    use Mutant\Contracts\AbstractPublisher;
    use Mutant\Events\FileOpenedEvent;
    use Mutant\Events\FileSavedEvent;

    final class Editor {

        private string $filename;
        private AbstractPublisher $eventPublisher;

        public function __construct(string $filename, AbstractPublisher $publisher) {
            $this->filename = $filename;
            $this->eventPublisher = $publisher;
        }

        public function openFile() {
            echo "Editor Abrindo o arquivo {$this->filename} \n";
            echo "#---------------------------------------------\n";
            $this->eventPublisher->notifySubscriber(new FileOpenedEvent($this->filename));
        }

        public function saveFile() {
            echo "Editor Salvando o arquivo {$this->filename} \n";
            echo "#---------------------------------------------\n";
            $this->eventPublisher->notifySubscriber(new FileSavedEvent($this->filename));
        }
    }
