<?php
/**
 * Created by PhpStorm.
 * UserModel: HP-PC
 * Date: 2019/2/24
 * Time: 10:17
 */
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class BaseController extends Controller
{
    /**
     * @var array
     */
    public $viewData = [];

    /**
     * @var int
     */
    public $userid = 0;

    /**
     * @var string
     */
    public $username = '';


    /**
     * @检查配置登录信息
     * @param $action
     * @return bool|void
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        $skey = Yii::$app->request->getPost('skey','');
        if(!empty($skey)){
            $usermodel = new \app\models\UserModel();
            $usermodel->setSkey($skey);
            $userinfo = $usermodel->getUserInfoBySkey();
            Yii::info($userinfo);
            $this->setUserinfo($userinfo);
        }else{
            $this->setUserinfo();
        }

        return true;
    }

    /**
     * 设置用户信息
     */
    public function setUserinfo($userinfo = [])
    {
        $this->userid = $this->viewData['userid'] = isset($userinfo['id']) ? $userinfo['id'] : 0;
        $this->username = $this->viewData['username'] = isset($userinfo['wxname']) ? $userinfo['wxname'] : '';
    }
}

