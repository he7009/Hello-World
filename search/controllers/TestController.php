<?php


namespace app\controllers;


use yii\web\Controller;

class TestController extends Controller
{
    public function actions()
    {
        return [
            "eve" => [
                "class" => "app\Common\Testeve",
                "param" => "duanyude&helilan"
                ]
        ];
    }

    public function actionIndex()
    {

    }

    public function actionEve()
    {

    }
}