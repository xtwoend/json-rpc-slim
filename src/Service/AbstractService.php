<?php

namespace App\Service;

use App\Application\Auth\AuthenticatedServer;
use Psr\Log\LoggerInterface;


/**
* 
*/
abstract class AbstractService
{
    /**
     * @var LoggerInterface
     */
    protected $logger;
    
    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke()
    {
        $service = $this->handle();
        $server = new AuthenticatedServer($service);
        return $server->reply(); 
    }

    abstract protected function handle();
}