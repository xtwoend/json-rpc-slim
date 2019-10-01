<?php

namespace App\Repository\User;

use Datto\JsonRpc\Exceptions\ApplicationException;

/**
* 
*/
class UserNotFoundException extends ApplicationException
{
    public $message = 'The user you requested does not exist.';

    public function __construct()
    {
        parent::__construct($this->message, 404, []);
    }
}