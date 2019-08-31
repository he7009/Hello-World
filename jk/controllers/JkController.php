<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/21
 * Time: 21:16
 */

namespace app\controllers;

use app\models\TL;
use yii\web\Controller;
use Yii;

class JkController extends Controller
{
    public function actionAli()
    {
        $tlModel = new TL();
        $tlModel->aliPay();
//        $tlModel->wxPay();
    }

    public function actionWx()
    {
        $tlModel = new TL();
        $tlModel->wxPay();
    }

    public function actionRefund()
    {

    }

    public function actionTransdetail()
    {

    }

    public function actionTransstatus()
    {

    }

    public function actionJkcall()
    {
        Yii::info($_GET);
        Yii::info($_POST);
        Yii::info($_SERVER);
    }

}