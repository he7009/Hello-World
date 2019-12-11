<?php
/**
 * Created by PhpStorm.
 * User: 段育德
 * Date: 2019/12/9
 * Time: 15:57
 */

include __DIR__ . '/ErrorHandle.php';

class ErrorClass
{
    public function __construct()
    {
        set_error_handler(array("ErrorHandle","handle"),E_ALL);
    }

    //PHP对于错误的处理
    public function start()
    {
        echo "开始错误处理(PHP5)","<hr />";
        try {
//            $this->nonExistMethod();
//            echo 1/0;
            trigger_error("手动出发错误");
        } catch (\Throwable $e) {
            echo "我有";
        }


        echo "<br /><hr />","结束错误处理(PHP5)";
    }
}

$ErrorClass = new ErrorClass();
$ErrorClass->start();