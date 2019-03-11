<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginModel;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * 设置
     */
    public static function actionIndex($event)
    {
        echo '1112222333445'.PHP_EOL;
        echo $event->data;
    }

    public function actionTar()
    {
        $this->trigger('event_home');
    }

}
