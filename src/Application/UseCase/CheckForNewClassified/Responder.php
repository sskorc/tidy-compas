<?php

namespace Application\UseCase\CheckForNewClassified;

use Domain\Classified\Classified;

interface Responder
{
    /**
     * @param \Domain\Classified\Classified $classified
     */
    public function newClassifiedFound(Classified $classified);

    public function noNewClassifiedFound();
}
