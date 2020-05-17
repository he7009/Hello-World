<?php
/**
 * Created by PhpStorm.
 * User: duanyude
 * Date: 2020/5/5 10:29
 */

class process
{
    /**
     * @原生PHP多进程
     */
    public static function index()
    {
        $maxChildProcess = 10;
        $curChildProcess = 0;

        while (true){
            $curChildProcess++;
            $pid = pcntl_fork();
            if($pid > 0){  //This Is Parent Process
                if($curChildProcess >= $maxChildProcess){
                    $childInfo = pcntl_wait($status);
                    var_dump($childInfo);
                    $curChildProcess--;
                }
            }elseif($pid == 0){ //This Is Child Process
                $random = rand(1,5);
                sleep($random);
                exit;
            }else{
                echo "Create Process Error \n";
            }
        }
    }

    public static function index2()
    {
        $maxChildProcess = 3;
        $curChildProcess = 0;
        $processNum = 0;

        declare(ticks = 1);
        pcntl_signal(SIGCHLD,function (){
            global $curChildProcess;
            $curChildProcess = $curChildProcess -1;
            echo "curChildProcess {$curChildProcess} \n";
        });

        while (true){
//            echo $curChildProcess . "\n";
            if($curChildProcess < $maxChildProcess){
                $processNum++;
                $curChildProcess++;
                $pid = pcntl_fork();
                if($pid == 0){
                    $randNum = rand(3,6);
                    echo "processNum {$processNum}\n";
                    sleep($randNum);
                    exit;
                }
            }else{
                $i = 0;
            }
        }
    }
}

process::index2();