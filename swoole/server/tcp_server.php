<?php

//创建Server对象，监听 127.0.0.1:9501端口
$serv = new Swoole\Server("127.0.0.1", 9501);

$serv->set([
    'reactor_num' => 2,
    'worker_num' => 10,
    'backlog' => 128,
    'max_request' => 5,
    'daemonize' => 1,
]);

//监听连接进入事件
$serv->on('Connect', function ($serv, $fd, $actur_id) {
    echo "Client: Connect. {$actur_id} - {$fd} \n";
});

//监听数据接收事件
$serv->on('Receive', function (Swoole\Server $serv, $fd, $actur_id, $data) {
    echo "Receive data: {$actur_id} - {$fd} - {$data} \n";
    $serv->send($fd, "Server: " . $data);
});

//监听连接关闭事件
$serv->on('Close', function ($serv, $fd) {
    echo "Client: Close.\n";
});

//启动服务器
$serv->start();