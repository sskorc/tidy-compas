<?php

namespace Domain\Classified;

class Classified
{
    /** @var string */
    private $url;

    /** @var Price */
    private $price;

    /**
     * @param string $url
     * @param Price $price
     */
    public function __construct($url, Price $price)
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
     * @return Price
     */
    public function getPrice()
    {
        return $this->price;
    }
}
