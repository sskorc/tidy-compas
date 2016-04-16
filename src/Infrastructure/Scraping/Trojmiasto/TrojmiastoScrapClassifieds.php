<?php

namespace Infrastructure\Scraping\Trojmiasto;

use Domain\Classified\Classified;
use Domain\Classified\ScrapClassifieds;
use Goutte\Client;

class TrojmiastoScrapClassifieds implements ScrapClassifieds
{
    /** @var \Goutte\Client */
    private $client;

    /**
     * @param \Goutte\Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /** {@inheritdoc} */
    public function findTopClassified($url)
    {
        $crawler = $this->client->request('GET', $url);

        $node = $crawler->filter('#wcontent > ul.list-ogl li')->first();

        $url = $node->filter('h2 a')->attr('href');
        $price = 1000;

        $classified = new Classified($url, $price);

        return $classified;
    }
}
