<?php
/**
 * Created by PhpStorm.
 * User: jeromecognet
 * Date: 27/09/2018
 * Time: 14:28
 */

namespace App\Command;


use App\Service\MessageCreator;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class EmailCreateCommand extends ContainerAwareCommand
{
    /**
     * @var MessageCreator
     */
    private $creator;

    public function __construct($name = null, MessageCreator $creator)
    {
        parent::__construct($name);
        $this->creator = $creator;
    }

    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('app:email:create')

            // the short description shown while running "php bin/console list"
            ->setDescription('Creates a new email.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('Test rabbit MQ')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $now = new \DateTime();
        $message = "Lancement de la commande de création email le ".$now->format("d/m/Y à H:i:s");

        $output->writeln($message);
        $this->creator->createMessage($message, 'toto');

    }

}