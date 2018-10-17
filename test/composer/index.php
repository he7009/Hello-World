<?php
/**
 * Created by PhpStorm.
 * User: ¶ÎÓıµÂ
 * Date: 2018/10/17
 * Time: 12:23
 */

require_once './vendor/autoload.php';

use Gregwar\Captcha\CaptchaBuilder;

$builder = new CaptchaBuilder;
$builder->build();
header('Content-type: image/jpeg');
//$builder->save('out.jpg');
$builder->output();