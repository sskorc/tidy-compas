<?php

namespace AppBundle;

use Goutte\Client;

class Scraper
{
    private $crawler;

    public function __construct($url)
    {
        $client = new Client();

        $this->crawler = $client->request('GET', $url);
    }

    public function findTopClassified()
    {
        $node = $this->crawler->filter('#wcontent > ul.list-ogl li')->first();

        return $node->filter('h2 a')->attr('href');
    }
}
