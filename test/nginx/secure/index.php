<?php
/**
 * Created by PhpStorm.
 * User: 段育德
 * Date: 2019/6/14
 * Time: 10:31
 */

$secure = "duanyude";
$time = time() + 60;

$md5 = base64_encode(md5($secure . $time,true));

$md5 = strtr($md5,'+/','-_');
$md5 =  str_replace('=', '', $md5);

echo "'secure.nginx.com?md5=" . $md5 . "&expires=" . $time . "'" . PHP_EOL;
