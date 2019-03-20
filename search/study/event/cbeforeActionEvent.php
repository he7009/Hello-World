<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/3/13
 * Time: 7:10
 */

namespace app\study\event;


class cbeforeActionEvent
{
    /**
     * 请求前事件
     */
    public function requestBefore($event)
    {
//        echo 'requestBefore';
//        echo $event->action->actionMethod."<br />";
//        echo $event->action->id."<br />"    ;
        echo 'wo shi ni da ye';
    }
}