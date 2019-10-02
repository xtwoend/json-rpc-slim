<?php

use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use App\Service\User\User;
use Datto\JsonRpc\Server;

require __DIR__ . '/../vendor/autoload.php';

$service = new Server(new User(new InMemoryUserRepository()));

$server = new swoole_server("127.0.0.1", 9501);

// Register the function for the event `connect`
$server->on('connect', function($server, $fd){
    echo "Client : Connect.\n";
});

// Register the function for the event `receive`
$server->on('receive', function($server, $fd, $from_id, $data) use ($service){
    $reply = $service->reply($data);
    $server->send($fd, $reply);
});

// Register the function for the event `close`
$server->on('close', function($server, $fd){
    echo "Client: {$fd} close.\n";
});

// Start the server
$server->start();



// {"jsonrpc":"2.0","method":"add","params":[1,2],"id":1}