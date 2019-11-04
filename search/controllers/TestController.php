<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/11/4
 * Time: 23:04
 */

namespace app\controllers;


use yii\web\Controller;
use app\models\table;

class TestController extends Controller
{
    public function actionIndex()
    {
        $data = table\SearchUser::find()->asArray()->one();
        var_dump($data);

        return "Test Index";
    }
}