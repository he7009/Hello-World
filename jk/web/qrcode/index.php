<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/21
 * Time: 21:51
 * https://jk.helilan.cn/jk/wx/
 */
include __DIR__ . '/phpqrcode.php';

$m = isset($_GET['m']) ? $_GET['m'] : '';
$value = 'https://sk.jkmjk.com/g/b/?p=e1d507d110788378ed361af99c7d89940a9c06b44c5239f26c1b5c6b5087ced97449530829f492b4a6ad8f64f5eea9b0';
$errorCorrectionLevel = 'L';
$matrixPointSize = 5;
\QRcode::png($value, false, $errorCorrectionLevel, $matrixPointSize, 2);