<?php
namespace app\controllers;
/**
 * Created by PhpStorm.
 * UserModel: HP-PC
 * Date: 2019/2/21
 * Time: 22:21
 */
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginModel;

class LoginController extends BaseController
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
        $result = $loginmodel->toTogin();

        //设置用户信息
        $this->setUserinfo($result['userinfo']);

        //返回信息
        $response=Yii::$app->response;
        $response->format=Response::FORMAT_JSON;
        $response->data = ['code' => 0 ,'userInfo' => $result['userinfo'],'skey' => $result['skey']];
    }

    public function actionUpdateinfo()
    {
        echo 1111;die;
    }
}