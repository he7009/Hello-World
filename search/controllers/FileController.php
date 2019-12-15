<?php


namespace app\controllers;


use yii\web\Controller;

class FileController extends Controller
{
    public function actionIndex()
    {
        $filePath = \Yii::getAlias("@app/File/aaa.txt");
        $this->asJson();
        return \Yii::$app->response->xSendFile($filePath,"ccc.txt");
    }
}