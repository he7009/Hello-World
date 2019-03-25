<?php
/**
 * Created by PhpStorm.
 * User: 段育德
 * Date: 2019/3/22
 * Time: 9:14
 */

class errorStudy
{
    public function index()
    {
        echo 'index'.PHP_EOL;
        throw new Exception('wo cuo le',400);
    }

    /**
     * @set_error_handle()
     * 自定义错误处理程序 处理warning,notice 级别错误
     * 覆盖系统错误处理程序
     */
    public static function customErrorHandle()
    {
        echo 11111;
    }


    public static  function handle_Exception(Throwable $e)
    {
        echo 2222;
        echo $e->getMessage();
    }


}

set_error_handler(array('errorStudy','customErrorHandle'));
set_exception_handler(array('errorStudy','handle_Exception'));

$errorstudy = new errorStudy();
$errorstudy->index();

