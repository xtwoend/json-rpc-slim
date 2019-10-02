<?php

declare(strict_types=1);

use App\Rpc\User\Procedure;
use DI\Container;
use UMA\JsonRpc\Server;

require __DIR__ . '/../vendor/autoload.php';

$container = new Container();
$container->set(Procedure\FindAll::class, new Procedure\FindAll());
$container->set(Procedure\FindById::class, new Procedure\FindById());

$sut = (new Server($container))
            ->set('findAll', Procedure\FindAll::class)
            ->set('findById', Procedure\FindById::class);

echo $sut->run('[
    {"jsonrpc": "2.0", "method": "findAll", "params": [], "id": 1},
    {"jsonrpc": "2.0", "method": "findById", "params": {"id": 2}, "id": 1}
]');
// echo $sut->run('{"jsonrpc": "2.0", "method": "findById", "params": {"id": 2}, "id": 1}');
