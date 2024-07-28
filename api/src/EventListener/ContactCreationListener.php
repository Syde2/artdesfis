<?php

namespace App\EventListener;

use App\Entity\Contact;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactCreationListener
{
    private $mailer;
    private $toEmail;

    public function __construct(MailerInterface $mailer, string $toEmail)
    {
        $this->mailer = $mailer;
        $this->toEmail = $toEmail;
    }

    public function postPersist(LifecycleEventArgs $args): void
    {
        $contact = $args->getObject();
        if (!$contact instanceof Contact) {
            return;
        }

        $email = (new Email())
            ->from($this->toEmail)
            ->to($this->toEmail)
            ->subject($contact->getNomArticle() . ' - ' . $contact->getReferenceArticle())
            ->text($contact->getMessage());

        $this->mailer->send($email);
    }
}