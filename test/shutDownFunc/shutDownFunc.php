<?php


class shutDownFunc
{
    public function start()
    {
        register_shutdown_function([$this,"shut_1"]);
        register_shutdown_function([$this,"shut_2"]);
        register_shutdown_function([$this,"shut_3"]);
        echo 2222 . PHP_EOL;
    }

    public function shut_1()
    {
        exit;
        echo "shut_1" . PHP_EOL;
    }

    public function shut_2()
    {
        echo "shut_2" . PHP_EOL;
    }

    public function shut_3()
    {
        echo"shut_3" . PHP_EOL;
    }
}

$shutDownFunc = new shutDownFunc();
$shutDownFunc->start();