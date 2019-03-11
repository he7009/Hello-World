<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginModel;
use app\models\ContactForm;
use app\study\event\loginEvent;

class HomeController extends Controller
{
    const EVENT_HOME = 'event_home';

    /**
     * 开始执行
     */
    public function actionIndex()
    {
        $this->on(self::EVENT_HOME,['app\controllers\SiteController','actionIndex'],999);
        yii\base\Event::on('app\controllers\HomeController',self::EVENT_HOME,['app\models\TargetEvent','start'],['段育德','helilan']);
        $event = new loginEvent();
        $event->data = ['jjjjjjj'];
        $this->trigger(self::EVENT_HOME,$event);
    }
}
