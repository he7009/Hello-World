<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/5/5
 * Time: 6:52
 */

class index
{
    public static function singleProcess()
    {
        $starttime = microtime(true);
        for ($i = 1;$i <= 10000000;$i++){
            echo $i.PHP_EOL;
        }
        $endtime = microtime(true);

        echo $endtime - $starttime.PHP_EOL;
    }


    public static function mulitProcess()
    {
        $maxprocess = 10;

        for ($i = 1;$i <= $maxprocess;$i++){

            $starnum = ($i - 1) * 1000000;
            $endnum = $i * 1000000;

            $pid= pcntl_fork();

            if($pid == -1){
                echo "create fail";
            }else if($pid == 0){
                echo 'child process NO:'.$i.PHP_EOL;
                for ($j = $starnum;$j <= $endnum;$j++){
                    echo $j.PHP_EOL;
                }
                exit;
            }
        }
    }

    public static function study()
    {
        $pid = pcntl_fork();
        if($pid)
        {
            pcntl_wait($status);
            $id = getmypid();
            echo "parent process,pid {$id}, child pid {$pid}/n";
        }
        else
        {
            $id = getmypid();
            echo "child process,pid {$id}/n";
            sleep(2);
        }
    }
}

index::study();