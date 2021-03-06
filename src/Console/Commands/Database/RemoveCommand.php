<?php

namespace Nur\Console\Commands\Database;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class RemoveCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('database:remove')
            ->addArgument('name', InputArgument::REQUIRED, 'The name for the database.')
            ->addOption('--type', '-t', InputOption::VALUE_OPTIONAL, 'The type for database.')
            ->setDescription('Remove a sqlite database.')
            ->setHelp("This command makes you to remove sqlite or sqlite3 database...");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $type = $input->hasParameterOption('--type');
        $databaseType = ($type) ? $input->getOption('type') : 'sqlite';
        $file = ROOT . '/storage/database/' . $name . '.' . $databaseType;

        if (file_exists($file)) {
            unlink($file);
            $output->writeln(
                "\n" . ' <info>+Success!</info> "' . ($name) . '" ' . $databaseType . ' database removed.'
            );
        } else {
            $output->writeln(
                "\n" . ' <error>-Error!</error> Database not found! (' . $name . '.' . $databaseType . ')'
            );
        }

        return;
    }
}
