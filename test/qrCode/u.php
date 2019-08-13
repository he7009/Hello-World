<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/13
 * Time: 22:17
 */

$str = var_export($_SERVER,true);

file_put_contents(__DIR__ . '/aaa.txt',$str,FILE_APPEND);