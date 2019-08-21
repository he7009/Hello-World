<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/21
 * Time: 21:51
 */
include __DIR__ . '/phpqrcode.php';

$value = 'http://jk.helilan.cn/jk/pay/';
$errorCorrectionLevel = 'L';
$matrixPointSize = 5;
\QRcode::png($value, false, $errorCorrectionLevel, $matrixPointSize, 2);