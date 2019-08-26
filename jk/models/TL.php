<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/21
 * Time: 22:49
 */

namespace app\models;

use Yii;
class TL extends TLBase
{

    public function aliPay()
    {
        $data = [
            'head' => [
                'txSno' => $this->orderId("txSno"),
                'mrchSno' => $this->orderId("mrchSno"),
                'bussSeqNo' => $this->orderId("bussSeqNo"),
                'txTime' => date("Y-m-d H:i:s"),
            ],
            'body' => [
                "acctType" => "03",
                'mechNo'=>"8201908260041161",
                'inetNo'=>$this->orderId(),
                'sndTm' => date("YmdHis"),
//                'clntSbtpId' => 'ojo615ItD1RzFrFdJDC',
//                'wechatPublicNo' => 'wx45b627473bc41c3b',
                'prdctMsg' => "Pay Test",
                'payAmount' => "10",
                "ccy" => "156",
                'sendDate' => date("Ymd"),
                'userNo' => 'CNJK020401',
                "channelCode" => "CNJK020401"
            ],
        ];
        echo "------接口：支付宝------"  . "<br /><br />";
        echo "------未加密data------" . "<br /><br />";
        echo json_encode($data);
        echo "<br /><br />";
        $res = $this->cityQuery($data,Yii::$app->params['JKTL']['aliPayUrl'],"支付宝");
        Yii::info($res);
        exit;
    }

    public function wxPay()
    {
        $data = [
            'head' => [
                'txSno' => $this->orderId("txSno"),
                'mrchSno' => $this->orderId("mrchSno"),
                'bussSeqNo' => $this->orderId("bussSeqNo"),
                'txTime' => date("Y-m-d H:i:s"),
            ],
            'body' => [
                'mechNo'=>"8201908260041161",
                'inetNo'=>$this->orderId(),
                'sndTm' => date("YmdHis"),
                "acctType" => "02",
                'clntSbtpId' => 'oRhbs4p8wuvK3umhKhyneOZkc',
                'wechatPublicNo' => 'wx9c53fd99ad70512c',
                'prdctMsg' => "Pay Test",
                'payAmount' => "10",
                "ccy" => "156",
                'toUserNo' => 'CNJK020401'
            ],
        ];

        echo "------接口：微信------"  . "<br /><br />";
        echo "------未加密data------" . "<br /><br />";
        echo json_encode($data);
        echo "<br /><br />";
        $res = $this->cityQuery($data,Yii::$app->params['JKTL']['wxPayUrl']);
        Yii::info($res);
        exit;
    }

}