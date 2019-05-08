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
        $array = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,21,22,23,24];

        $arr = array_chunk($array,4);

        for ($i = 1;$i <= 10;$i++){
            $pid = pcntl_fork();

            if($pid == -1){
                echo 'Create Fail';
            }else if($pid == 0){
                //子进程
                echo "Child Process Success,Child Pid : " . posix_getpid() . ",Parent " . posix_getppid() . PHP_EOL;
                sleep($i);
                exit;
            }else{


            }
        }

        //父进程
        pcntl_wait($status);

    }
}

index::study();