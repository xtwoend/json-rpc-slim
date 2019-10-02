<?php

$client = new swoole_client(SWOOLE_SOCK_TCP);
if (!$client->connect('127.0.0.1', 9501, -1))
{
    exit("connect failed. Error: {$client->errCode}\n");
}

$client->send('{"jsonrpc":"2.0","id":1,"method":"show","params": {"id": 1}}');

$data = $client->recv();

$data = json_decode($data);

if(isset($data->result)){
    var_dump($data->result);
}
$client->close();