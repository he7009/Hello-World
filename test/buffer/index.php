<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/4/12
 * Time: 7:24
 */
header('X-Accel-Buffering: no');           // 关闭加速缓冲
ob_start();
for ($i = 0; $i < 10; $i++) {

    echo $i . "<br />";
//    ob_flush();

    ob_flush();
    flush();
    sleep(1);
}