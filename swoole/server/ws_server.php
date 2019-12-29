<?php

$wsHttp = new Swoole\WebSocket\Server("192.168.33.10",9511);

$wsHttp->on("open",function($wsHttp,$request){
    echo "server: Connect Success with fd {$request->fd}" . PHP_EOL;
});

$wsHttp->on("message",function($wsHttp,$frame){
    echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
    $wsHttp->push($frame->fd,"this is server");
});

$wsHttp->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$wsHttp->start();

