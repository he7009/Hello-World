<?php


namespace app\Common;


use yii\base\Action;

class Testeve extends Action
{
    public $param;

    public function run()
    {
        echo $this->param,"<br>";
        echo "Testeve", "<br>";
    }
}