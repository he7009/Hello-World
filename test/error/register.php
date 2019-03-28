<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/3/28
 * Time: 7:05
 */

class register
{
    public function __construct()
    {
        register_shutdown_function([$this,'register1']);
        register_shutdown_function([$this,'register2']);
    }


    public function register1()
    {
        echo '111111'.PHP_EOL;
    }

    public function register2()
    {
        echo '22222'.PHP_EOL;
        register_shutdown_function([$this,'register3']);
    }

    public function register3()
    {
        echo '33333'.PHP_EOL;
    }
}

$register = new register();

