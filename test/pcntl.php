<?php

/**
 * PHP 多进程调试
 * Class pcntl
 */
class pcntl
{

    public function start()
    {
        echo 11;die;
    }

}

$pcntl = new pcntl();
$pcntl->start();
