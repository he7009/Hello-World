<?php

class erroraction
{

    public function run()
    {
        echo '222'.PHP_EOL;
        trigger_error('hahahah,wocuow le');
        var_dump(error_reporting());

    }

    public function index()
    {
        echo 'index_public'.PHP_EOL;
        try{
            Throw new Exception('我错了！哈哈哈哈哈');
        }catch (Error $e){
            echo 'catch';
            echo $e->getCode().PHP_EOL;
            echo $e->getMessage().PHP_EOL;
            echo $e->getFile().PHP_EOL;
        }
        echo '异常之后执行代码';
    }



    /**
     * 错误处理函数
     */
    public static function error_hanidle($errorno,$errorstr)
    {
        echo 'error_handle'.PHP_EOL;
        echo 'errorno:'.$errorno.PHP_EOL;
        echo 'errorstr:'.$errorstr.PHP_EOL;
    }

    /**
     * 异常处理函数
     */
    public static function exception_handle(Throwable $e)
    {
        echo "exception_handle".PHP_EOL;
        echo 'exception_msg:'.$e->getMessage().PHP_EOL;
    }

    /**
     * 结束最后处理函数
     */
    public static function shutdown_handle()
    {
        echo 'shutdown_handle'.PHP_EOL;
    }
}


set_error_handler(['erroraction','error_hanidle']);
set_exception_handler(["erroraction",'exception_handle']);
register_shutdown_function(['erroraction','shutdown_handle']);


$erroraction = new erroraction();
$erroraction->run();