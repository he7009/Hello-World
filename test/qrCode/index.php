<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/13
 * Time: 21:38
 */
include __DIR__ . '/phpqrcode.php';

class index
{
    public function start()
    {
        $value = 'https://sk.helilan.cn/g/b/?p=e1d507d110788378ed361af99c7d89940abd1574f3f194d7703570bdc3f7fd0c41bba1a8ec1c3c2678b8bd2fa9f157ba';
        $errorCorrectionLevel = 'L';  //容错级别
        $matrixPointSize = 5;      //生成图片大小
        QRcode::png($value, false, $errorCorrectionLevel, $matrixPointSize, 2);
    }
}

$index = new index();
$index->start();