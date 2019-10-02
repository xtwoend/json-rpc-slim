<?php

namespace App\Console;

use App\Console\Commands;

/**
* 
*/
class Kernel
{

    /**
     * Register Commmand 
     * @var [type]
     */
    protected $commands = [
        Commands\TCPServ::class
    ];

    /**
     * [getCommands description]
     * @return [type] [description]
     */
    public function getCommands()
    {
        return $this->commands;
    }
}