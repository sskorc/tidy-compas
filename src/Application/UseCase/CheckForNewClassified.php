<?php

namespace Application\UseCase;

use Application\UseCase\CheckForNewClassified\Command;
use Application\UseCase\CheckForNewClassified\Responder;
use Domain\Classified\ClassifiedNotFoundException;
use Domain\Classified\ClassifiedRepository;
use Domain\Classified\NotifyAboutNewClassified;
use Domain\Classified\ScrapClassifieds;

class CheckForNewClassified
{
    /** @var \Domain\Classified\ScrapClassifieds */
    private $classifiedService;

    /** @var \Domain\Classified\NotifyAboutNewClassified */
    private $notifyAboutNewClassified;

    /** @var \Domain\Classified\ClassifiedRepository */
    private $classifiedRepository;

    /**
     * @param \Domain\Classified\ScrapClassifieds $classifiedService
     * @param \Domain\Classified\NotifyAboutNewClassified $notifyAboutNewClassified
     * @param \Domain\Classified\ClassifiedRepository $classifiedRepository
     */
    public function __construct(
        ScrapClassifieds $classifiedService,
        NotifyAboutNewClassified $notifyAboutNewClassified,
        ClassifiedRepository $classifiedRepository
    ) {
        $this->classifiedService = $classifiedService;
        $this->notifyAboutNewClassified = $notifyAboutNewClassified;
        $this->classifiedRepository = $classifiedRepository;
    }

    /**
     * @param \Application\UseCase\CheckForNewClassified\Command $command
     * @param \Application\UseCase\CheckForNewClassified\Responder $responder
     */
    public function execute(Command $command, Responder $responder)
    {
        $classified = $this->classifiedService->findTopClassified($command->getUrl());

        try {
            $previousClassified = $this->classifiedRepository->findLastClassified();
        } catch (ClassifiedNotFoundException $e) {
            $previousClassified = null;
        }

        if (empty($previousClassified) || $classified->getUrl() != $previousClassified->getUrl()) {
            $this->classifiedRepository->add($classified);
            $this->notifyAboutNewClassified->execute($classified, $command->getEmail());
            $responder->newClassifiedFound($classified);
        } else {
            $responder->noNewClassifiedFound();
        }
    }
}
