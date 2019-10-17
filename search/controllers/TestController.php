<?php
/**
 * Created by PhpStorm.
 * User: ╤нсЩ╣б
 * Date: 2019/10/15
 * Time: 16:37
 */

namespace app\controllers;


use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex()
    {

        \Yii::beginProfile('TestProfile');
        sleep(5);
        \Yii::endProfile('TestProfile');

        return "Test Index";

    }
}