<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/4/12
 * Time: 7:24
 */
ob_end_clean();
header('X-Accel-Buffering: no');           // 关闭加速缓冲
for ($i = 0; $i < 100; $i++) {
    echo $i . "<br />";
//    ob_flush();
    flush();
    sleep(2);
}