<?php


namespace app\models\Events;


class BeforeRequest
{
    public static function start($event)
    {
        echo $event->data,"<br />";
        echo "BeforeRequest" ,"<br />";
    }
}