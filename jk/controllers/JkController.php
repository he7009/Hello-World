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
        $tlModel = new TL();
        $tlModel->aliPay();
    }

    public function actionWx()
    {
        $code = Yii::$app->request->get('code');
        $rsp = Http::get("https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx3b494ab165585a3c&secret=29fb53c700fb0152aa65c80e0a043477&code={$code}&grant_type=authorization_code");
        $rspArr = json_decode($rsp,true);
        if(empty($rspArr) || !$rspArr['openid']){
           echo "<script>alert('Failed,Please try again');</script>";
           exit;
        }
        $openId = $rspArr['openid'];
        $tlModel = new TL();
        $tlModel->setOpenid($openId);
        $resArr = $tlModel->wxPay();

        $this->layout = 'jk';
        return $this->render("wx",['resArr' => $resArr]);
    }

    public function actionWxr()
    {
        header("location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx3b494ab165585a3c&redirect_uri=https://jk.helilan.cn/jk/wx/&response_type=code&scope=snsapi_base");
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
        $tlModel->refund();
    }

    public function actionTransdetail()
    {
        $tlModel = new TL();
        $tlModel->transDetail();
    }

    public function actionTransstatus()
    {
        $tlModel = new TL();
        $tlModel->transStatus();
    }

    public function actionJkcall()
    {
        $code = Yii::$app->request->get('code');
        $content = Http::get("https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx3b494ab165585a3c&secret=29fb53c700fb0152aa65c80e0a043477&code={$code}&grant_type=authorization_code");
        $this->layout = 'jk';
        return $this->render("jkcall",['data' => $content]);
    }

}