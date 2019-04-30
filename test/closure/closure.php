<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/4/21
 * Time: 10:47
 */
class ClassLoader
{

}


class autoloadstatic
{
    public static $files = array (
        '1111' =>'2222',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {

        }, null, ClassLoader::class);
    }
}


$ClassLoader = new ClassLoader();

call_user_func(autoloadstatic::getInitializer($ClassLoader));

var_dump(ClassLoader::files);
var_dump($ClassLoader);