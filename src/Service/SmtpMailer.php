<?php
declare(strict_types=1);

namespace App\Service;


use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class SmtpMailer
{
    /**
     * @param array $data
     */
    public function sendMail(array $data): void
    {
        $mailer = $this->getMailer($data);
        $message = $this->createMessage($data);
        $mailer->send($message);
    }

    private function getMailer(array $data): Swift_Mailer
    {
        $transport = new Swift_SmtpTransport($data['host'], $data['port'], $data['encryption']);
        $transport->setUsername($data['username']);
        $transport->setPassword($data['password']);

        return new Swift_Mailer($transport);
    }

    private function createMessage(array $data): Swift_Message
    {
        $message = (new Swift_Message($data['subject']))
            ->setBody($data['body'], 'text/html')
            ->setFrom($data['email'])
            ->setTo($data['to']);

        return $message;
    }
}