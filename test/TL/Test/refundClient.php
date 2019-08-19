<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/18
 * Time: 15:53
 */
include __DIR__ . "/Base.php";

class refundClient extends Base
{
    /**
     * ΢��֧��
     */
    public function refund()
    {
        $reqData = $this->getReqData();
        var_dump($reqData);
        $res = $this->cityQuery($reqData,$this->config['refundUrl']);
        var_dump($res);
    }

    /**
     * ��ȡ��������
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
                'sndTm' => date("YmdHis"),
                'oriInetNo' => $this->orderId(),
                'channelCode' => "CNJK020401",
                'refundAmt' => "10",
                "ccy" => "156"
            ],
        ];

        return $data;
    }

}

$refundClient = new refundClient();
$refundClient->refund();