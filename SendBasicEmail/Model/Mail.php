<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\SendBasicEmail\Model;

use Magento\Framework\Mail\Message;
use Magento\Framework\Mail\TransportInterfaceFactory;
class Mail
{

    protected $messageFactory;

    protected $mailTransportFactory;

    public function __construct(
        Message $messageFactory,
        TransportInterfaceFactory $transportInterfaceFactory
    ) {
        $this->messageFactory       = $messageFactory;
        $this->mailTransportFactory = $transportInterfaceFactory;
    }

    public function sendMessage()
    {
        $message = $this->messageFactory;

        $message->setMessageType('html');
        $message->setFrom('custom2@mysite.com');
        $message->addTo('tester@mysite.com');
        $message->setBodyHtml(
            '<strong>Pork exercitation bresaola ex.</strong> '.
            '<p>Fatback boudin occaecat drumstick sausage spare ribs.  Enim bresaola ham non ut aliquip anim turkey landjaeger.  Incididunt frankfurter pancetta, andouille tail venison culpa drumstick.</p>'
        );
        $message->setSubject('Simple Email Example');

        $mailTransport = $this->mailTransportFactory->create(
            [
                'message' => $message
            ]
        );

        $mailTransport->sendMessage();
    }

    public function sendCustomMessage($type, $from, $to, $bodyHtml, $subject)
    {
        $message = $this->messageFactory;

        $message->setMessageType($type); // 'html'
        $message->setFrom($from);
        $message->addTo($to);
        $message->setBodyHtml($bodyHtml);
        $message->setSubject($subject);

        $mailTransport = $this->mailTransportFactory->create(
            [
                'message' => $message
            ]
        );

        $mailTransport->sendMessage();
    }
}
