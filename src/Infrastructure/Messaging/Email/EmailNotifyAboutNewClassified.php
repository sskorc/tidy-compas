<?php

namespace Infrastructure\Messaging\Email;

use Domain\Classified\Classified;
use Domain\Classified\NotifyAboutNewClassified;

class EmailNotifyAboutNewClassified implements NotifyAboutNewClassified
{
    private $mailer;

    private $templating;

    public function __construct($mailer, $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    /** {@inheritdoc} */
    public function execute(Classified $classified, $email)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('New classified ad')
            ->setFrom('from@example.com')
            ->setTo($email)
            ->setBody(
                $this->templating->render(
                    'Emails/newClassified.html.twig',
                    [
                        'url' => $classified->getUrl(),
                        'price' => $classified->getPrice(),
                        'location' => $classified->getLocation(),
                    ]
                ),
                'text/html'
            )
        ;
        $this->mailer->send($message);
    }
}
