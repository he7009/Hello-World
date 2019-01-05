<?php

/**
 * PHP 多进程调试
 * Class pcntl
 */
class pcntl
{

    public function start()
    {
        $ppid = posix_getpid();
        $pid = pcntl_fork();
        if ($pid == -1) {
            throw new Exception('fork子进程失败!');
        } elseif ($pid > 0) {
            cli_set_process_title("我是父进程,我的进程id是{$ppid}.");
            sleep(3); // 保持30秒，确保能被ps查到
        } else {
            $cpid = posix_getpid();
            cli_set_process_title("我是{$ppid}的子进程,我的进程id是{$cpid}.");
            sleep(300);
        }
    }

}

$pcntl = new pcntl();
$pcntl->start();
