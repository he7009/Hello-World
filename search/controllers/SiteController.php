<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginModel;
use app\models\ContactForm;
use app\behaviors\CtrlBehavior;

class SiteController extends Controller
{


    public function actionIndex()
    {
        $controller = new BehaviorController();
        $behavior = new CtrlBehavior();

        $controller->attachBehavior('behavior',$behavior);
        echo $controller->param_1;
        echo $controller->extendMethodForCtrl();

    }

}
