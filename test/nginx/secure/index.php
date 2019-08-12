<?php
/**
 * Created by PhpStorm.
 * User: 段育德
 * Date: 2019/6/14
 * Time: 10:31
 */

$secure = "/aaa/bbb.html" . " " . "duanyude";
$time = time() + 600;

$md5 = base64_encode(md5($secure . " " . $time, true));
$md5 = strtr($md5, '+/', '-_');
$md5 = str_replace('=', '', $md5);

echo "curl -i 'secure.nginx.com/aaa/bbb.html?token=" . $md5 . "&st=" . $time . "'" . PHP_EOL;
