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
        $value = 'https://sk.helilan.cn/jk/bscan/?p=e1d507d110788378ed361af99c7d89940abd1574f3f194d7703570bdc3f7fd0cb238b04fd60afc5375ad8dd5f8387f8d';
        $errorCorrectionLevel = 'L';  //容错级别
        $matrixPointSize = 5;      //生成图片大小
        QRcode::png($value, false, $errorCorrectionLevel, $matrixPointSize, 2);
    }
}

$index = new index();
$index->start();