<?php
/**
 * Created by PhpStorm.
 * User: 段育德
 * Date: 2019/4/2
 * Time: 15:53
 */

namespace dyd;


class core
{
    //初始化框架
    public function run()
    {
        //注册自动加载类函数
        spl_autoload_register(['core','autoload'],true,true);

    }


    public static function autoload($classname)
    {

    }

}


(new core())->run();