<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/31
 * Time: 11:47
 */

class index
{
    public function run()
    {
        header("https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx9c53fd99ad70512c&redirect_uri=https://jk.helilan.cn/jk/jkcall/&response_type=code&scope=snsapi_base");
    }
}

$index = new index();
$index->run();