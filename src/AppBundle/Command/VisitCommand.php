<?php

namespace AppBundle\Command;

use Application\UseCase\CheckForNewClassified;
use Domain\Classified\Classified;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class VisitCommand extends ContainerAwareCommand implements CheckForNewClassified\Responder
{
    /** @var \Domain\Classified\Classified */
    private $classified;

    protected function configure()
    {
        $this
            ->setName('visit')
            ->setDescription('Visit URL')
            ->addArgument(
                'url',
                InputArgument::REQUIRED
            )
            ->addArgument(
                'email',
                InputArgument::REQUIRED
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = $input->getArgument('url');
        $email = $input->getArgument('email');

        $checkForNewClassified = $this->getCheckForNewClassifiedUseCase();

        $checkForNewClassified->execute(
            new CheckForNewClassified\Command($url, $email),
            $this
        );

        $output->writeln('Top classified ad is: ' . $this->classified->getUrl());
    }

    private function getCheckForNewClassifiedUseCase()
    {
        return $this->getContainer()->get('use_case.check_for_new_classified');
    }

    /** {@inheritdoc} */
    public function newClassifiedFound(Classified $classified)
    {
        $this->classified = $classified;
    }

    /** {@inheritdoc} */
    public function noNewClassifiedFound()
    {
    }
}
