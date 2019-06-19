<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/6/14
 * Time: 7:40
 */

$secret = "helilan";
$uri = 'secure.html';
$time = time() + 60;

$md5 = base64_encode(md5($uri . $secret,true));
$md5 = strtr($md5, '+/', '-_');
$md5 = str_replace('=', '', $md5);

$md5 = md5($uri . $secret);

echo  "curl -i 'http://secure.nginx.com/check/{$md5}/{$uri}'" . PHP_EOL;