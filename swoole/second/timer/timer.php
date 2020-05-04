<?php
/**
 * Created by PhpStorm.
 * User: duanyude
 * Date: 2020/5/4 21:01
 */

class timer
{
    public static function start()
    {
        echo "timer start\n";
        Swoole\Timer::tick(1000,function ($timerId) {
            echo "Swoole({$timerId}) Time Tick\n";
            Swoole\Timer::after(10000,function () use ($timerId){
                echo "Swoole Time After\n";
                sleep(10);
                Swoole\Timer::clear($timerId);
            });
        });
        echo "timer end\n";
    }
}

timer::start();