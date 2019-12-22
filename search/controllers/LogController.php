<?php


namespace app\controllers;


use yii\web\Controller;

class LogController extends Controller
{
    public function actionIndex()
    {
        \Yii::error("段育德");
        return "段育德";
    }
}