<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/18
 * Time: 15:53
 */
include __DIR__ . "/Base.php";

class wxpayClient extends Base
{
    /**
     * 微信支付
     */
    public function wxPay()
    {
        $reqData = $this->getReqData();
        echo "-------Reqest Data-------" . PHP_EOL;
        var_dump($reqData);
        $res = $this->cityQuery($reqData,$this->config['wxPayUrl']);
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
                'mechNo'=>"8201908130041074",
                'inetNo'=>$this->orderId(),
                'sndTm' => date("YmdHis"),
                "acctType" => "02",
                'clntSbtpId' => 'ojo615ItD1RzFrFdJDC',
                'wechatPublicNo' => 'wx45b627473bc41c3b',
                'prdctMsg' => "Pay Test",
                'payAmount' => "10",
                "ccy" => "156"
            ],
        ];

        return $data;
    }

}

$wxpayClient = new wxpayClient();
$wxpayClient->wxPay();