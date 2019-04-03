<?php
/**
 * Created by PhpStorm.
 * User: 段育德
 * Date: 2019/4/3
 * Time: 18:13
 */

class app
{
    public static $aliases = [];


    public static function setPathMap($alias,$path)
    {
        if(strncmp($alias,'@',1)){
            $alias = '@'.$alias;
        }

        if($path !== null){
            if()
        }
    }

    public static function autoload()
    {

    }


}