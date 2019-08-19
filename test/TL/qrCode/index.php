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
        $value = 'http://test.helilan.cn/qrCode/u.php';         //二维码内容
        $errorCorrectionLevel = 'L';  //容错级别
        $matrixPointSize = 5;      //生成图片大小
        //生成二维码图片
        $filename = __DIR__ . '/' . microtime() . '.png';
        QRcode::png($value, false, $errorCorrectionLevel, $matrixPointSize, 2);
    }
}

$index = new index();
$index->start();