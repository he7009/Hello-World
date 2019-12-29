<?php


$http = new swoole\http\server("0.0.0.0",8811);
$http->set([
    'enable_static_handler' => true,
    'document_root' => '/vagrant/Hello-World/swoole/html',
//    'daemonize' => 1
]);
$http->on("request",function ($request,$response){
    $response->header("Content-Type","text/html; charset=utf-8");
    $response->end("我是一只小小鸟" . json_encode($request->get));
});
$http->start();