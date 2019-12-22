<?php


class debugTrace_2
{
    public static function over()
    {
        echo "OVEr" . PHP_EOL;
        $arr = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
        array_pop($arr);
        var_dump($arr);
    }
}

