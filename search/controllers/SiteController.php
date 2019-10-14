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
     * rewrite
     */
    public function actionRewrite()
    {
        $userTable = new \app\models\table\User();
        $userTable->username = "zhagnsan";
        $userTable->passwd = md5("jianing" . time());
        $userTable->createtime = date("Y-m-d H:i:s");
        $userTable->save();

        $userTable = new \app\models\table\User();
        $userTable->loginname = "jianing";
        $userTable->createtime = date("Y-m-d H:i:s");
        $userTable->save();
        exit;
    }

}
