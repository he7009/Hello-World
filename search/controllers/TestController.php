<?php
/**
 * Created by PhpStorm.
 * User: 段育德
 * Date: 2019/10/15
 * Time: 16:37
 */

namespace app\controllers;


use app\models\Test;
use yii\web\Controller;
use app\models\table;

class TestController extends Controller
{
    public function actionIndex()
    {
        $data = table\User::find()->asArray()->one();
        var_dump($data);

        $testModel = new Test();
        $testModel->tuceshi();


        return "Test Index";
    }


}