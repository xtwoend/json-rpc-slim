<?php

namespace App\Rpc\User\Procedure;

use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use UMA\JsonRpc\Procedure;
use UMA\JsonRpc\Request;
use UMA\JsonRpc\Response;
use UMA\JsonRpc\Success;

/**
* 
*/
class FindById implements Procedure
{
    protected $id;

    public function __invoke(Request $request): Response
    {
        $this->id = $request->id();
        $params = $request->params();

        return $this->handle($params);
    }

    public function getSpec(): ?\stdClass
    {
        $schema = file_get_contents(__DIR__.'/../Schema/user.json');
        return \json_decode($schema);
    }

    protected function handle($params)
    {
        $items = (new InMemoryUserRepository)->findUserOfId($params->id);
        return new Success($this->id, $items);
    }
}