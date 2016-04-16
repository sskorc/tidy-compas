<?php

namespace Domain\Classified;

interface ScrapClassifieds
{
    /**
     * @param string $url
     * @return Classified
     */
    public function findTopClassified($url);
}
