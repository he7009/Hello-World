<?php


class ErrorHandle
{
    public static function Handle()
    {
        echo "错误处理函数触发","</br>";
        throw new Exception("错误手动触发异常");
    }
}

class ShutDown
{
    public static function Handle()
    {
        echo "shoutdown 捕获";
        throw new Exception("错误手动触发异常");
    }
}