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
        $value = 'http://test.helilan.cn/qrCode/u.php';         //��ά������
        $errorCorrectionLevel = 'L';  //�ݴ���
        $matrixPointSize = 5;      //����ͼƬ��С
        //���ɶ�ά��ͼƬ
        $filename = __DIR__ . '/' . microtime() . '.png';
        QRcode::png($value, false, $errorCorrectionLevel, $matrixPointSize, 2);
    }
}

$index = new index();
$index->start();