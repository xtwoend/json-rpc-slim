<?php

namespace App\Repository\Exception;

use Datto\JsonRpc\Exceptions\Exception;

/**
* 
*/
abstract class RepositoryException extends Exception 
{
    public $code = '500';
    public $data = null;

    public function __construct()
    {
        parent::__construct($this->message, $this->code, $this->data);
    }
}
