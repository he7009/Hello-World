<?php

include __DIR__ . "/ErrorHandle.php";
class ErrorClass
{
    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }

    public function __construct()
    {
        set_error_handler(array("ErrorHandle","Handle"));
        register_shutdown_function(array("ShutDown","Handle"));
    }

    public function start()
    {
        try{
//            $this->run();
//            throw new Exception("错误手动触发异常");
            trigger_error("我出发了一个用户级别的错误",E_USER_ERROR);
        }catch (Exception $e){
            echo "捕获到异常";
        }
    }
}

$ErrorClass = new ErrorClass();
$ErrorClass->start();