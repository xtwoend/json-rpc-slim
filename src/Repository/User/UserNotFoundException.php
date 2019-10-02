<?php

namespace App\Repository\User;

use App\Repository\Exception\RepositoryNotFoundException;

/**
* 
*/
class UserNotFoundException extends RepositoryNotFoundException
{
    public $message = 'The user you requested does not exist.';
    public $data = [
        'line' => 'error handle' 
    ];
}