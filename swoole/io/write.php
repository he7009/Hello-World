<?php
/**
 * Created by PhpStorm.
 * User: duanyude
 * Date: 2020/1/6 7:53
 */

$content = "duanyude:" . date("Y-m-d H:i:s") . PHP_EOL;
swoole_async_writefile(__DIR__ . "/access.log",$content,function ($fileName){
    echo "Write Success" . PHP_EOL;
},FILE_APPEND);

echo "Write End" . PHP_EOL;