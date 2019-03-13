<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/3/12
 * Time: 22:02
 */

namespace app\study\behavior;

use yii\base\Behavior;

class loginBehavior extends Behavior
{
    public $name = 'duanyude';

    /**
     *
     */
    public function getname()
    {
        echo $this->name;
    }
}