<?php
/**
 * Created by PhpStorm.
 * User: duanyude
 * Date: 2020/1/10 7:56
 */

$startTime = microtime(true);

$urls = [
    "http://www.baidu.com?search=1",
    "http://www.baidu.com?search=2",
    "http://www.baidu.com?search=3",
    "http://www.baidu.com?search=4",
    "http://www.baidu.com?search=5",
    "http://www.baidu.com?search=6",
];
$total = count($urls);
$ppid = posix_getppid();
$works = [];

for ($i = 0;$i<$total;$i++){
    $process = new swoole_process(function (swoole_process $pro) use ($i,$urls){
        swoole_set_process_name("work pid {$pro->pid}");
        $content = moCurl($urls[$i]);
        $pro->write($content);
    },true);
    $process->start();
    $works[] = $process;
}

foreach ($works as $process){
    echo $process->read();
}

$endTime = microtime(true);

echo $endTime - $startTime,PHP_EOL;

//模拟处理
function moCurl($url){
    sleep(1000);
    return $url . " SUCCESS " . PHP_EOL;
}