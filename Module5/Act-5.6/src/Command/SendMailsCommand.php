<?php

namespace App\Command;

use App\Repository\UserRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SendMailsCommand extends Command
{
    protected static $defaultName = 'app:send-mails';
    protected static $defaultDescription = 'Add a short description for your command';

    private $mailer;

    public function __construct(mailerInterface $mailerInterface, UserRepository $userRepo)
    {
        $this->mailer = $mailerInterface;
        $this->userRepo = $userRepo;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription(self::$defaultDescription)
            ->addArgument('adresseEmail', InputArgument::OPTIONAL, 'addresseEmail')
            ->addOption('type', null, InputOption::VALUE_REQUIRED, 'type')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $users = $this->userRepo->findAll();
        foreach ($users as $user) {
            if (!in_array('ROLE_ADMIN',$user->getRoles())) {
                $address[] = $user->getEmail();
            }
        }
            $email = (new Email())
            ->from('habib.hajjem@talan.com');

            
            if($input->getArgument('adresseEmail')){
                $email->to($input->getArgument('adresseEmail'));

                if ($input->getOption('type')) {

                    if ($input->getOption('type') == 'inscription') {
                        $email->subject('inscription')
                        ->text('Thanks for your registration');
                    } elseif($input->getOption('type') == 'confirmation') {
                        $email->subject('confirmation')
                        ->text('Your account is activated.');
                    }else{
                        return 1;
                    }
                } else{
                   $email->subject('confirmation')
                   ->text('Helloo !');
                }
            }
            else{
                $email->to(...$address)
                ->subject('Time for Symfony Mailer!')
                ->text('Helloo !');
                
            }
  
        $this->mailer->send($email);


        $io->success('Emails sends successfully !');

        return 0;
    }
}
