<?php
/**
 * Created by PhpStorm.
 * User: 段育德
 * Date: 2019/12/9
 * Time: 16:36
 */

class ErrorHandle
{
    public static function handle($errno, $errstr, $errfile, $errline)
    {
        var_dump($errno);
        echo "<br />";
        var_dump($errstr);
        echo "<br />";
        var_dump($errfile);
        echo "<br />";
        var_dump($errline);
        echo "<br />";
        echo "错误处理函数开始处理错误","<br>";
    }
}