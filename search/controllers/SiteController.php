<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $param['info'] = Yii::$app->db->createCommand('SELECT * FROM search_test')->queryAll();
        return $this->render('index',$param);
    }

    /**
     * test
     */
    public function actionDoubleWord()
    {
        echo 22;
        $data = Yii::$app->db->createCommand('SELECT * FROM search_test')->queryOne();
        var_export($data);

    }

    /**
     * 展示数据
     */
    public function actionTwo()
    {
        $param['info'] = Yii::$app->db->createCommand('SELECT * FROM search_test')->queryAll();
        $this->render('index',$param);
    }
}
