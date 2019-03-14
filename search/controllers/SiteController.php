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
        $behavior = new CtrlBehavior();
        echo 222;

        $this->attachBehavior('CtrlBehavior',$behavior);
        echo $this->param_1;

    }

}
