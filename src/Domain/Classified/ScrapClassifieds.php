<?php

namespace Domain\Classified;

interface ScrapClassifieds
{
    /**
     * @param string $url
     */
    public function findTopClassified($url);
}
