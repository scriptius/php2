<?php

namespace App;

class MailForLog {

    public static function Send($textMessage, $subject = 'Оповещение системы') {
        // Create the message
        $message = new \Swift_Message();
        $message->setSubject($subject)
                ->setFrom(array('levik04122008@yandex.ru' => 'Mamonov Viktor'))
                ->setTo(array('masevius@rambler.ru' => 'A name'))
                ->setBody($textMessage);

// Create the Transport
        $config = \App\Config::instance();
        $transport = (new \Swift_SmtpTransport('smtp.yandex.ru', 465, 'ssl'))
                ->setUsername($config->data['emailAdmin']['login'])
                ->setPassword($config->data['emailAdmin']['pass']);

        $mailer = new \Swift_Mailer($transport);

// Send the message
        $result = $mailer->send($message);
    }

}
