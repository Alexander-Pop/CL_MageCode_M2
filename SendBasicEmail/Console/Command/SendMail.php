<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\SendBasicEmail\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Codelegacy\SendBasicEmail\Model\Mail;

class SendMail extends Command
{

    protected $mail;

    public function __construct(
        Mail $mail,
        $name = null
    ) {
        $this->mail = $mail;
        parent::__construct($name);
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {

        $this->mail->sendMessage();

        $output->writeln("Email Send");
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName("codelegacy_sendbasicemail:sendmail");
        $this->setDescription("send email");

        parent::configure();
    }
}
