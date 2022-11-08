<?php

namespace App\Command;

use App\Model\Person;
use App\Service\ShuffleArray;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

#[AsCommand(
    name: 'app:christmas',
)]
class ChristmasCommand extends Command
{
    public function __construct(private readonly MailerInterface $mailer) {
        parent::__construct();
    }
    
    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Add your family here
        $persons = [
            new Person(name: 'Mom', email: 'mom@gmail.com'),
            new Person(name: 'Dad', email: 'dad@gmail.com'),
        ];

        $givesToPersons = ShuffleArray::shuffle($persons);

        foreach($persons as $i => $person) {
            $givesTo = $givesToPersons[$i];
            $email = (new Email())
                ->from('example@example.com') // set your email here to avoid being flagged as spam
                ->to($person->email)
                ->subject('Informations noël 🎅')
                ->text('Hohohooooo '.$person->name.' ! Ton heureux élu de noël est '.$givesTo->name.' ! Offre lui un beauuu cadeau et dépense tout ton argent ! ');
            $this->mailer->send($email);
        }

        return Command::SUCCESS;
    }
}
