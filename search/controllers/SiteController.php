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
        return $this->renderPartial('index');
    }

    /**
     *
     */
    public function actionError()
    {
        return $this->renderPartial('error');
    }

    /**
<<<<<<< HEAD
     * 重写测试
     */
    public function actionRewrite()
    {
        echo "Rwrite Action";
=======
     * rewrite
     */
    public function actionRewrite()
    {
        echo "echo Rewrete";
>>>>>>> badc239e379b3f4ba389d7b5d762e9e099a6eeff
        exit;
    }

}
