<?php
/**
 * Created by PhpStorm.
 * User: 段育德
 * Date: 2019/1/10
 * Time: 10:03
 */

class download
{
    public function getinfo()
    {
        $file = file_get_contents('https://github.com/yiisoft/yii2/archive/2.0.15.1.zip');
        file_put_contents('./yii2.zip',$file);
    }
}