<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/21
 * Time: 21:16
 */

namespace app\controllers;

use app\models\Http;
use app\models\Paylist;
use app\models\TL;
use yii\web\Controller;
use Yii;

class JkController extends Controller
{
    public function actionAli()
    {
        $money = Yii::$app->request->get('m','10');
        $tlModel = new TL();
        $tlModel->setPayAmount($money);
        $tlModel->aliPay();
    }

    public function actionWx()
    {
        $code = Yii::$app->request->get('code');
        $state = Yii::$app->request->get('state','10');
        $rsp = Http::get("https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx3b494ab165585a3c&secret=29fb53c700fb0152aa65c80e0a043477&code={$code}&grant_type=authorization_code");
        $rspArr = json_decode($rsp,true);
        if(empty($rspArr) || !$rspArr['openid']){
           echo "<script>alert('Failed,Please try again');</script>";
           exit;
        }
        $openId = $rspArr['openid'];
//        $openId = 'oGAHm01BQK_zDbGOTJwEWTumtrz4';
        $tlModel = new TL();
        $tlModel->setPayAmount($state);
        $tlModel->setOpenid($openId);
        $resArr = $tlModel->wxPay();

        $this->layout = 'jk';
        return $this->render("wx",['resArr' => $resArr]);
    }

    public function actionWxr()
    {
        $m = Yii::$app->request->get('m','10');
        header("location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx3b494ab165585a3c&redirect_uri=https://jk.helilan.cn/jk/wx/&response_type=code&scope=snsapi_base&state={$m}");
        exit;
    }

    public function actionWxp()
    {
        $tlModel = new TL();
        $code = Yii::$app->request->get("code");
        $tlModel->setCode($code);
        $tlModel->wxPPay();
    }

    public function actionPaylist()
    {
        $paystatus = intval(Yii::$app->request->get('paystatus'));
        $paylistModel = new Paylist();
        $paylistModel->setPaystatus($paystatus);
        $data = $paylistModel->getPayList();
        $viewData['paylist'] = $data;
        $this->layout = 'jk';
        return $this->render('paylist',$viewData);
    }

    public function actionRefund()
    {
        $tlModel = new TL();
        $oriInetNo = Yii::$app->request->get('order');
        $m = Yii::$app->request->get('m','10');
        $tlModel->setOriInetNo($oriInetNo);
        $tlModel->setPayAmount($m);
        $tlModel->refund();
    }

    public function actionTransdetail()
    {
        $tlModel = new TL();
        $oriInetNo = Yii::$app->request->get('order');
        $tlModel->setOriInetNo($oriInetNo);
        $tlModel->transDetail();
    }

    public function actionTransstatus()
    {
        $tlModel = new TL();
        $oriInetNo = Yii::$app->request->get('order');
        $tlModel->setOriInetNo($oriInetNo);
        $tlModel->transStatus();
    }

    public function actionScanpay()
    {
        $tlModel = new TL();
        $code = Yii::$app->request->get('code');
        $money = Yii::$app->request->get('m');
        $tlModel->setCode($code);
        $tlModel->setPayAmount($money);
        $tlModel->scanPay();
    }

    public function actionJkcall()
    {
        $code = Yii::$app->request->get('code');
        $content = Http::get("https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx3b494ab165585a3c&secret=29fb53c700fb0152aa65c80e0a043477&code={$code}&grant_type=authorization_code");
        $this->layout = 'jk';
        return $this->render("jkcall",['data' => $content]);
    }

}