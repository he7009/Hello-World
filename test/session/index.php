<?php
/**
 * Created by PhpStorm.
 * User: 段育德
 * Date: 2019/4/10
 * Time: 9:38
 */

class index
{
    public function start()
    {
        session_start();
        $_SESSION['uid'] = 121111;
        echo session_save_path();
    }
}

$index = new index();
$index->start();