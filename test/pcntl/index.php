<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/5/5
 * Time: 6:52
 */

class index
{
    public static function study()
    {
        $pid = pcntl_fork();
        if ($pid === 0) {
            $myid = posix_getpid();
            $parentId = posix_getppid();
            fwrite(STDOUT, "my pid: $myid, parentId: $parentId\n");
            sleep(5);
            $myid = posix_getpid();
            $parentId = posix_getppid();
            fwrite(STDOUT, "my pid: $myid, parentId: $parentId\n");
        } else {
            fwrite(STDOUT, "parent exit\n");
        }

    }

    public static function pStudy()
    {

    }
}

index::pStudy();