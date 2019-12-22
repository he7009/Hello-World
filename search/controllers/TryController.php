<?php
/**
 * Created by PhpStorm.
 * User: 段育德
 * Date: 2019/12/9
 * Time: 15:42
 */

namespace app\controllers;


use yii\web\Controller;

class TryController extends Controller
{
    /**
     * @throws \Exception
     */
    public function actionIndex()
    {
        //异常处理
        throw new \Exception("我是一个异常，哈哈哈哈。我故意的！");
    }
}