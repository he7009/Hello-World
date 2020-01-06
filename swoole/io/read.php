<?php

$filePath = __DIR__ . "/1.txt";

echo "start Read" . PHP_EOL;

swoole_async_readfile($filePath,function ($fileName,$fileContent){
    echo $fileName . PHP_EOL;
    echo $fileContent . PHP_EOL;
});

echo "end Read " . PHP_EOL;