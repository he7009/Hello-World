<?php

namespace app\controllers;

use Yii;
use yii\db\Exception;
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
        echo 2222;
        throw new \yii\base\UserException('不好意思，我异常了');
        return $this->renderPartial('index');
    }

    /**
     *
     */
    public function actionError()
    {
        return $this->renderPartial('error');
    }

}
