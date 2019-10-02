<?php

namespace App\Console\Commands;

use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
* 
*/
class Command extends BaseCommand
{
    protected $signature;
    protected $description;

    public $args;
    public $output;

    protected function configure()
    {
        $this->setName($this->signature)->setDescription($this->description);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    { 
        $this->args = $input;
        $this->output = $output;

        $this->handle();
    }
}