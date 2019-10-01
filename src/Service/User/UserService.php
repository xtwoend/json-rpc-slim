<?php

namespace App\Service\User;

use App\Repository\User\UserRepository;
use App\Service\AbstractService;
use Psr\Log\LoggerInterface;

/**
* 
*/
class UserService extends AbstractService
{
    protected $userRepository;

    public function __construct(LoggerInterface $logger, UserRepository $userRepository)
    {
        parent::__construct($logger);
        $this->userRepository = $userRepository;
    }

    protected function handle()
    {
        return new User($this->userRepository);
    }
}