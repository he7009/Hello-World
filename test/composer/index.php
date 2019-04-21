<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/4/20
 * Time: 14:44
 */

include __DIR__.'/vendor/autoload.php';


//(new app\src\capture())->stare();

//(new app\src\application\Home())->index();
use Gregwar\Captcha\CaptchaBuilder;
header('Content-type: image/jpeg');
$builder = new CaptchaBuilder;
$builder->build();
$builder->output();