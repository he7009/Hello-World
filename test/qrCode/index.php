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
        $value = 'http://www.ydphp.site';         //��ά������
        $errorCorrectionLevel = 'L';  //�ݴ���
        $matrixPointSize = 5;      //����ͼƬ��С
        //���ɶ�ά��ͼƬ
        $filename = __DIR__ . '/' . microtime() . '.png';
        QRcode::png($value, false, $errorCorrectionLevel, $matrixPointSize, 2);
//        $QR = $filename;        //�Ѿ����ɵ�ԭʼ��ά��ͼƬ�ļ�
//        $QR = imagecreatefromstring(file_get_contents($QR));
//        //���ͼƬ
//        imagepng($QR, 'qrcode.png');
//        imagedestroy($QR);
//        return '<img src="qrcode.png" alt="ʹ��΢��ɨ��֧��">';
    }
}

$index = new index();
$index->start();