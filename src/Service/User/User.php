<?php

namespace App\Service\User;

use App\Service\AbstractEvaluator;
use Datto\JsonRpc\Evaluator;
use Datto\JsonRpc\Exceptions\ArgumentException;
use Datto\JsonRpc\Exceptions\Exception;
use Datto\JsonRpc\Exceptions\MethodException;
use Datto\JsonRpc\Responses\ErrorResponse;

/**
* User Service
*/
class User extends AbstractEvaluator implements Evaluator
{
    protected $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function evaluate($method, $arguments)
    {
        $this->arguments = $arguments;

        if(! method_exists(self::class, $method)){
            throw new MethodException();
        }
        
        return call_user_func([self::class, $method]);
    }

    private function findAll()
    {
        return $this->repository->findAll();
    }

    private function show()
    {
        $schema = file_get_contents(__DIR__.'/Schema/findById.json');

        if(! $this->schemaValidator($schema)){
            throw new ArgumentException();
        }
        
        return $this->repository->findUserOfId($this->arguments['id']);
    }
}