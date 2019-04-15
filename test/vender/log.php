<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/4/16
 * Time: 6:39
 */

class log
{

    public static function write($content,$pathname = '')
    {
        if($pathname == ""){
            $pathname = __DIR__."/../log/error.txt";
        }else{
            $pathname = __DIR__."/../log/" . $pathname . ".txt";
        }


        file_put_contents($pathname,$content.PHP_EOL,FILE_APPEND);
    }


}
