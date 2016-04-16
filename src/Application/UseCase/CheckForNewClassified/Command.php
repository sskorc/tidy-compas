<?php

namespace Application\UseCase\CheckForNewClassified;

class Command
{
    /** @var string */
    private $url;

    /** @var string */
    private $email;

    /**
     * @param string $url
     * @param string $email
     */
    public function __construct($url, $email)
    {
        $this->url = $url;
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}
