<?php

namespace App\Console\Commands;

use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use App\Service\User\User;
use Datto\JsonRpc\Server as RpcServer;
use Hprose\Socket\Server;

/**
* 
*/
class TCPServ extends Command implements CommandInterface
{
    protected $signature = 'tcp:serv';
    protected $description = 'Run TCP service';
    protected $port = 3030;

    public function handle()
    {
        $this->output->writeLn("Server running on port {$this->port}");

        $server = new Server("tcp://0.0.0.0:{$this->port}");
        $server->setErrorTypes(E_ALL);
        $server->setDebugEnabled();
        $server->addMethod('reply', $this);
        $server->start();
    }

    public function reply($message)
    {
        $service = new RpcServer(new User(new InMemoryUserRepository()));
        return $service->reply($message);
    }
}