<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/2/25
 * Time: 7:38
 */
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\UserModel;
class UserController extends BaseController
{
    /**
     * 获取用户已购书籍列表
     */
    public function actionBooklist()
    {
        $usermodel = new UserModel($this->userid);
        $booklist = $usermodel->getUserBookList();
        $response = Yii::$app->response;
        $response->format = $response::FORMAT_JSON;
        $response->data = ['code' => 0 ,'booklist' => $booklist];;
    }
}