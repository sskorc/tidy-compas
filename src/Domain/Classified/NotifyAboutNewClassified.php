<?php

namespace Domain\Classified;

interface NotifyAboutNewClassified
{
    /**
     * @param \Domain\Classified\Classified $classified
     * @param string $email
     */
    public function execute(Classified $classified, $email);
}
