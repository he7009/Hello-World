<?php


namespace app\controllers;


use yii\web\Controller;

class RequestController extends Controller
{
    public function actionIndex()
    {
        $request = \Yii::$app->request;
        var_dump($request->getUserHost());
        exit;
    }
}