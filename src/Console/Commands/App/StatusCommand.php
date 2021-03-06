<?php

namespace Nur\Console\Commands\App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StatusCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:status')
            ->setDescription("The current state of the application.");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = ROOT . '/app.down';

        if (! file_exists($file)) {
            $output->writeln(
                "\n" . " Nur Application's running."
            );
        } else {
            $output->writeln(
                "\n" . " Nur Application has been stopped."
            );
        }

        return;
    }
}
