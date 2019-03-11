<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/3/12
 * Time: 7:08
 */

namespace app\models;

use yii\base\Model;
class TargetEvent extends Model
{
    /**
     * 绑定事件
     */
    public function start($event)
    {
        echo 'app\models\targetevent';
        echo "<br />";
        var_export($event->data);
        var_export($event->data2);
    }
}