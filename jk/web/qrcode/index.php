<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/21
 * Time: 21:51
 * https://jk.helilan.cn/jk/wx/
 */
include __DIR__ . '/phpqrcode.php';

$value = 'https://jk.helilan.cn/jk/wx/';
$errorCorrectionLevel = 'L';
$matrixPointSize = 5;
\QRcode::png($value, false, $errorCorrectionLevel, $matrixPointSize, 2);