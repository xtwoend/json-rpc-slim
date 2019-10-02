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

    /**
     * [__construct description]
     * @param UserRepository $userRepository [description] with
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    protected function handle()
    {
        return new User($this->userRepository);
    }
}