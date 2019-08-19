<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/18
 * Time: 15:53
 */
include __DIR__ . "/Base.php";

class alipayClient extends Base
{
    /**
     * 支付宝支付
     */
    public function alipay()
    {
        $reqData = $this->getReqData();
        var_dump($reqData);
        $res = $this->cityQuery($reqData,$this->config['aliPayUrl']);
        var_dump($res);
    }

    /**
     * 获取请求数据
     */
    public function getReqData()
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
                'mechNo'=>"8201907040006301",
                'inetNo'=>$this->orderId(),
                'sndTm' => date("YmdHis"),
                'clntSbtpId' => 'ojo615ItD1RzFrFdJDC',
                'wechatPublicNo' => 'wx45b627473bc41c3b',
                'prdctMsg' => "Pay Test",
                'payAmount' => "10",
                "ccy" => "156",
                'sendDate' => date("Ymd"),
                "channelCode" => "CNJK020401"
            ],
        ];

        return $data;
    }
}

$alipayClient = new alipayClient();
$alipayClient->alipay();