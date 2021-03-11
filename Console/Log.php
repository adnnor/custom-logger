<?php
namespace Ad\Logger\Console;

use Ad\Logger\Model\Logger;
use Ad\Logger\Model\Logger\Datewise;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Log extends Command
{
    const OPTION = "option";
    const ARGUMENT = "p";
    /**
     * @var Logger
     */
    private $logger;
    /**
     * @var Datewise
     */
    private $datewise;

    /**
     * Revert constructor.
     *
     * @param   Logger        $logger
     * @param   Datewise      $datewise
     * @param   string|null   $name
     */
    public function __construct(
        Logger $logger,
        Datewise $datewise,
        string $name = null
    ) {
        parent::__construct($name);
        $this->logger = $logger;
        $this->datewise = $datewise;
    }

    /*
     * return void
     */
    protected function configure()
    {
        $this->setName('ad:logger')
            ->setDescription('Create simple and datewise logs')
            ->addOption(
                self::OPTION,
                null,
                InputOption::VALUE_REQUIRED,
                'Description of this option'
            )->addArgument(
                'p',
                InputArgument::REQUIRED,
                'Description of this param'
            )->setHelp(
                <<<HELP
How to do this:
 <comment>%command.full_name% argument --option='abc'</comment>
HELP
            );

        parent::configure();
    }

    /**
     * @param   InputInterface    $input
     * @param   OutputInterface   $output
     *
     * @return int|void|null
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($option = $input->getOption(self::OPTION)) {
            $output->writeln("<comment>Option received: $option</comment>");
        } else {
            throw new \Exception("Parameter not passed!");
        }

        if ($argument = $input->getArgument(self::ARGUMENT)) {
            $output->writeln("<comment>Argument received: $argument</comment> \n");
        }

        $this->logger->execute();
        $this->datewise->execute();

        $output->writeln("<info>Logs created!</info> check under var/log/simple & var/log/datewise");
    }
}
