<?php

namespace App\EventListener;

use App\Entity\Contact;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Notifier\Message\SmsMessage;
use Symfony\Component\Notifier\TexterInterface;

class ContactCreationListener
{
    private $mailer;
    private $texter;
    private $toEmail;
    private $toPhone;

    public function __construct(
        MailerInterface $mailer, 
        TexterInterface $texter, 
        string $toEmail, 
        ?string $toPhone = null
    ) {
        $this->mailer = $mailer;
        $this->texter = $texter;
        $this->toEmail = $toEmail;
        $this->toPhone = $toPhone;

    }

    public function postPersist(LifecycleEventArgs $args): void
    {
        $contact = $args->getObject();
        if (!$contact instanceof Contact) {
            return;
        }

        // Send email
        $email = (new Email())
            ->from($this->toEmail)
            ->to($this->toEmail)
            ->subject($contact->getNomArticle() . ' - ' . $contact->getReferenceArticle())
            ->text($contact->getMessage());

        $this->mailer->send($email);

        // Send SMS if phone number is set
        $sms = new SmsMessage(
            // the phone number to send the SMS message to
            $this->toPhone,
            // the message
            "Vous avez un nouveau message de la part de l'art des fils : \n".$contact->getMessage(),
            // optionally, you can override default "from" defined in transports
            // '+1422222222',
            // you can also add options object implementing MessageOptionsInterface
            // $options
        );

            $this->texter->send($sms);
        
    }
}