<?php
/**
 * Created by PhpStorm.
 * User: 段育德
 * Date: 2019/3/30
 * Time: 14:26
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\User;

class UserController extends Controller
{
    public function actionIndex()
    {
        $user = new User();
        $user->username = '段育德';
        $user->createtime = date('Y-m-d H:i:s');
        $user->save();
    }
}