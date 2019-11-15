# Magento 2 Module Send Basic Email

This is a simple example module to send a email with minimal code 
and without using the Magento Email templating system

- Dependency Inject construct \Codelegacy\SendBasicEmail\Model\Mail $mail
- Then trigger the email by using $this->mail->sendMessage();
- or $this->mail->sendCustomMessage($type, $from, $to, $bodyHtml, $subject)