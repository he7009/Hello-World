<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginModel;
use app\models\ContactForm;

class HomeController extends Controller
{
    const EVENT_HOME = 'event_home';

    public function __construct()
    {
        $this->on(self::EVENT_HOME,['app\controllers\SiteController','index']);
    }

    /**
     * ¿ªÊ¼Ö´ÐÐ
     */
    public function actionIndex()
    {
        echo 3344;
        $this->trigger(self::EVENT_HOME);
    }
}
