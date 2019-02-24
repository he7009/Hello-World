<?php
namespace app\controllers;
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/2/21
 * Time: 22:21
 */
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginModel;
use app\models\ContactForm;

class LoginController extends Controller
{

    /**
     * 登录信息
     */
    public function actionLogin()
    {
        $request = Yii::$app->request;
        $code = $request->get('code');
        $rawData = $request->get('rawData');
        $signature = $request->get('signature');
        $encryptedData = $request->get('encryptedData');
        $iv = $request->get('iv');

        //发送请求获取数据
        $loginmodel = new LoginModel();
        $loginmodel->setCode($code);
        $loginmodel->setRawData($rawData);
        $loginmodel->toTogin();
        exit();

    }
}