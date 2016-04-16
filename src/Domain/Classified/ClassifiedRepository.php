<?php

namespace Domain\Classified;

interface ClassifiedRepository
{
    /**
     * @param \Domain\Classified\Classified $classified
     */
    public function add(Classified $classified);
}
