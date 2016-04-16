<?php

namespace Application\UseCase;

use Application\UseCase\CheckForNewClassified\Command;
use Application\UseCase\CheckForNewClassified\Responder;
use Domain\Classified\NotifyAboutNewClassified;
use Domain\Classified\ScrapClassifieds;

class CheckForNewClassified
{
    /** @var \Domain\Classified\ScrapClassifieds */
    private $classifiedService;

    /** @var \Domain\Classified\NotifyAboutNewClassified */
    private $notifyAboutNewClassified;

    /**
     * @param \Domain\Classified\ScrapClassifieds $classifiedService
     * @param \Domain\Classified\NotifyAboutNewClassified $notifyAboutNewClassified
     */
    public function __construct(ScrapClassifieds $classifiedService, NotifyAboutNewClassified $notifyAboutNewClassified)
    {
        $this->classifiedService = $classifiedService;

        $this->notifyAboutNewClassified = $notifyAboutNewClassified;
    }

    /**
     * @param \Application\UseCase\CheckForNewClassified\Command $command
     * @param \Application\UseCase\CheckForNewClassified\Responder $responder
     */
    public function execute(Command $command, Responder $responder)
    {
        $classified = $this->classifiedService->findTopClassified($command->getUrl());

        $this->notifyAboutNewClassified->execute($classified, $command->getEmail());

        $responder->newClassifiedFound($classified);
    }
}
