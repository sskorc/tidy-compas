<?php

namespace Infrastructure\Persistance\File;

use Domain\Classified\Classified;
use Domain\Classified\ClassifiedRepository;
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
        $this->filesystem->write('classified.txt', $classified->getUrl());
    }
}
