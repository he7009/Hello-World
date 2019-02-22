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

        Yii::info('$code---->'.$code);
        Yii::info('$rawData---->'.$rawData);
        Yii::info('$signature---->'.$signature);
        Yii::info('$encryptedData---->'.$encryptedData);
        Yii::info('$iv---->'.$iv);

        //发送请求获取数据
//        GET https://api.weixin.qq.com/sns/jscode2session?appid=APPID&secret=SECRET&js_code=JSCODE&grant_type=authorization_code

        $loginmodel = new LoginModel();
        $loginmodel->setCode($code);
        $loginmodel->setRawData($rawData);
        $loginmodel->toTogin();
        exit();

    }
}