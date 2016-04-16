<?php

namespace Domain\Classified;

class Classified
{
    /** @var string */
    private $url;

    /** @var float */
    private $price;

    /**
     * @param string $url
     * @param float $price
     */
    public function __construct($url, $price)
    {
        $this->url = $url;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
}
