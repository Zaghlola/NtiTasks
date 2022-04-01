<?php

namespace app\mail;
use app\mail\Mail;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class verificationMail extends Mail
{
    private $emailTo,$subject,$body;
    public function __construct(string $emailTo, string $subject, string $body)
    {
        $this->emailTo = $emailTo;
        $this->subject = $subject;
        $this->body = $body;
    }

    public function send()
    {

        try {
            $mail = $this->serverSetting();
            //Recipients
            $mail->setFrom('ntiproject.x1@gmail.com', 'Ecommerce');
            $mail->addAddress($this->emailTo);             

            //Content
            $mail->isHTML(true);                                  
            $mail->Subject = $this->subject;
            $mail->Body    = $this->body;

            $mail->send();
            // echo 'Message has been sent';
            return true;
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }

}
