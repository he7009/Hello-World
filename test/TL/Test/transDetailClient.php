<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/18
 * Time: 15:53
 */
include __DIR__ . "/Base.php";

class transDetailClient extends Base
{
    /**
     * 微信支付
     */
    public function transDetail()
    {
        $reqData = $this->getReqData();
        var_dump($reqData);
        $res = $this->cityQuery($reqData,$this->config['transDetailUrl']);
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
                'mechNo'=>"8201907040006301",
                'inetNo'=>$this->orderId(),
                'channelCode' => "CNJK020401",
                'userNo' => "222222525",
            ],
        ];

        return $data;
    }

}

$transDetail = new transDetailClient();
$transDetail->transDetail();