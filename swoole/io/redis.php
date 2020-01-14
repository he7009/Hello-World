<?php
/**
 * swoole async redis
 * Created by PhpStorm.
 * User: duanyude
 * Date: 2020/1/9 7:21
 */



$redisClient = new swoole_redis();

$redisClient->connect("127.0.0.1",6379,function (swoole_redis $redisClient,$result){
    echo $result ? "Connect Success\n" : "Connect Fail\n";
    !$result && exit;

    $redisClient->set("name","swoole",function (swoole_redis $redisClient,$result){
        var_dump($result);
        echo "SET: name -> duanyude Success" . PHP_EOL;
    });

    $redisClient->get("name",function (swoole_redis $redisClient,$result){
        var_dump($result);
        echo "GET: name -> " . $result . " Success" . PHP_EOL;
        $redisClient->close();
    });
});

