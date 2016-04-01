<?php

namespace AppBundle\Command;

use AppBundle\Scraper;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class VisitCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('visit')
            ->setDescription('Visit URL')
            ->addArgument(
                'url',
                InputArgument::REQUIRED
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = $input->getArgument('url');

        $scraper = new Scraper($url);

        $output->writeln('Newest classified ad is: ' . $scraper->findNewestClassified());
    }
}
