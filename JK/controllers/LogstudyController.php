<?php
/**
 * Created by PhpStorm.
 * User: 段育德
 * Date: 2019/8/21
 * Time: 17:57
 */

namespace app\controllers;


use yii\web\Controller;
use Yii;

class LogstudyController extends Controller
{
    public function actionStart()
    {
        Yii::warning("我错了，哈哈哈哈哈");
        Yii::error("我错了errre，哈哈哈哈哈","error");
        Yii::warning($_GET);
        Yii::warning(['eee','eee','sdsd']);
        return "段育德";
    }
}