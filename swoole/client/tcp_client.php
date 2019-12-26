<?php

$clinet = new swoole_client(SWOOLE_SOCK_TCP);

if(!$clinet->connect('127.0.0.1',9501)){
    echo "连接失败" . PHP_EOL;
    exit;
}

fwrite(STDOUT,'请输入参数：');
$msg = trim(fgets(STDIN));

$clinet->send($msg);
$data = $clinet->recv();

echo $data . PHP_EOL;

$clinet->close();
exit;
