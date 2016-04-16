<?php

namespace Infrastructure\Persistance\File;

use Domain\Classified\Classified;
use Domain\Classified\ClassifiedNotFoundException;
use Domain\Classified\ClassifiedRepository;
use Domain\Classified\Price;
use League\Flysystem\Filesystem;

class FileClassifiedRepository implements ClassifiedRepository
{
    /**
     * @var \League\Flysystem\Filesystem
     */
    private $filesystem;

    /**
     * @param \League\Flysystem\Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /** {@inheritdoc} */
    public function add(Classified $classified)
    {
        if ($this->filesystem->has('classified.txt')) {
            $this->filesystem->update('classified.txt', $classified->getUrl());
        } else {
            $this->filesystem->write('classified.txt', $classified->getUrl());
        }
    }

    /** {@inheritdoc} */
    public function findLastClassified()
    {
        if ($this->filesystem->has('classified.txt')) {
            $url = $this->filesystem->read('classified.txt');
            $classified = new Classified($url, new Price(0));
        } else {
            throw new ClassifiedNotFoundException();
        }

        return $classified;
    }
}
