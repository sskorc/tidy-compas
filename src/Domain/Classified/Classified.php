<?php

namespace Domain\Classified;

class Classified
{
    /** @var string */
    private $url;

    /** @var Price */
    private $price;

    /** @var string */
    private $location;

    /**
     * @param string $url
     * @param Price $price
     * @param string $location
     */
    public function __construct($url, Price $price, $location)
    {
        $this->url = $url;
        $this->price = $price;
        $this->location  = $location;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return Price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }
}
