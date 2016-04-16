<?php

namespace Domain\Classified;

class Price
{
    /** @var int */
    private $amount;

    /**
     * @param int $amount
     */
    public function __construct($amount)
    {
        $this->setAmount($amount);
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->amount;
    }

    private function setAmount($amount)
    {
        $amount = preg_replace('/\s+/', '', $amount);
        $this->amount = (int) $amount;
    }
}
