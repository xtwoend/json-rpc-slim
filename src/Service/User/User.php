<?php

namespace App\Service\User;

use Datto\JsonRpc\Evaluator;
use Datto\JsonRpc\Exceptions\ArgumentException;
use Datto\JsonRpc\Exceptions\Exception;
use Datto\JsonRpc\Exceptions\MethodException;
use Datto\JsonRpc\Responses\ErrorResponse;

/**
* User Service
*/
class User implements Evaluator
{
    protected $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function evaluate($method, $arguments)
    {
        switch ($method) {
            case 'findAll':
                return self::findAll();
                break;
                
            case 'show':
                return self::show($arguments);
                break;

            default:
                throw new MethodException();
                break;
        }
    }

    private function findAll()
    {
        return $this->repository->findAll();
    }

    private function show($arguments)
    {
        if(! isset($arguments['id'])){
            throw new ArgumentException();
        }

        if (!is_int($arguments['id'])) {
            throw new ArgumentException();
        }
        
        return $this->repository->findUserOfId($arguments['id']);
    }
}