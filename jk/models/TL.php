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
    private $code = 0;

    /**
     * 支付宝支付
     */
    public function aliPay()
    {
        $data = [
            'head' => [
                'txSno' => $this->orderId("txSno"),  //交易流水号
                'mrchSno' => $this->orderId("mrchSno"),  //商户编号
                'bussSeqNo' => $this->orderId("bussSeqNo"),
                'txTime' => date("Y-m-d H:i:s"),
            ],
            'body' => [
                "acctType" => "03",
                'mechNo'=>"8201908280041143",
                'inetNo'=>$this->orderId(),
                'sndTm' => date("YmdHis"),
                'prdctMsg' => "CK-190826-0001(珠溪酒业)",
                'payAmount' => "10",
                "ccy" => "156",
                'sendDate' => date("Ymd"),
                'userNo' => 'CNJK020401',
                "channelCode" => "CNJK020401"
            ],
        ];
        $res = $this->cityQuery($data,Yii::$app->params['JKTL']['aliPayUrl']);
        header('location:' . $res['body']['quickRspString']);
        exit;
    }

    /**
     * 微信支付
     */
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
                'mechNo'=>"8201908280041143",
                'inetNo'=>$this->orderId(),
                'sndTm' => date("YmdHis"),
                "acctType" => "02",
                'clntSbtpId' => 'oRhbs4p8wuvK3umhKhyneOZkc0Cw',
                'wechatPublicNo' => 'wx9c53fd99ad70512c',
                'prdctMsg' => "CK-190826-0001",
                'payAmount' => "10",
                "ccy" => "156",
                'toUserNo' => 'CNJK020401'
            ],
        ];

        $res = $this->cityQuery($data,Yii::$app->params['JKTL']['wxPayUrl']);
        echo json_encode($res,JSON_UNESCAPED_UNICODE);
        exit;
    }

    //微信小程序
    public function wxPPay()
    {
        $output = $this->wxOpenid();
        $output = json_decode($output,true);
        $data = [
            'head' => [
                'txSno' => $this->orderId("txSno"),
                'mrchSno' => $this->orderId("mrchSno"),
                'bussSeqNo' => $this->orderId("bussSeqNo"),
                'txTime' => date("Y-m-d H:i:s"),
            ],
            'body' => [
                'mechNo'=>"8201908280041143",
                'inetNo'=>$this->orderId(),
                'sndTm' => date("YmdHis"),
                "acctType" => "02",
                'clntSbtpId' => $output['openid'],
                'wechatPublicNo' => 'wx9c53fd99ad70512c',
                'prdctMsg' => "CK-190826-0001",
                'payAmount' => "10",
                "ccy" => "156",
                'toUserNo' => 'CNJK020401'
            ],
        ];
        $res = $this->cityQuery($data,Yii::$app->params['JKTL']['wxPayUrl']);
        echo json_encode($res,JSON_UNESCAPED_UNICODE);
        exit;
    }

    /**
     * 接收到code到微信验证信息
     */
    public function wxOpenid()
    {
        $url = 'https://api.weixin.qq.com/sns/jscode2session?appid=wx9c53fd99ad70512c&secret=4531e2169e4590bff4d11aaebb7e37cb&js_code=' . $this->code . "&grant_type=authorization_code";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        $output = curl_exec($ch);
        curl_close($ch);
        // $output = json_decode($output,true);
        return $output;
    }

    /**
     * @退款接口
     */
    public function refund()
    {
        $data = [
            'head' => [
                'txSno' => $this->orderId("txSno"),
                'mrchSno' => $this->orderId("mrchSno"),
                'bussSeqNo' => $this->orderId("bussSeqNo"),
                'txTime' => date("Y-m-d H:i:s"),
            ],
            'body' => [
                'mechNo'=>"8201908280041143",
                'inetNo'=>$this->orderId(),
                'sndTm' => date("YmdHis"),
                'oriInetNo' => "82019090210094356711950985018565",
                'oriTranSeqNo' => "82019090210122029765865898342648",
                'channelCode' => "CNJK020401",
                'refundAmt' => "10",
                "ccy" => "156"
            ],
        ];

        $res = $this->statusCityQuery($data,Yii::$app->params['JKTL']['refundUrl']);
        echo "----退款接口---- <br /> <br />";
        echo "----未加密参数---- <br /> <br />";
        echo json_encode($data,JSON_UNESCAPED_UNICODE) . "<br /> <br />";
        echo "----发送数据---- <br /> <br />";
        echo json_encode($res['data'],JSON_UNESCAPED_UNICODE) . "<br /> <br />";
        echo "----响应内容---- <br /> <br />";
        echo json_encode($res['res'],JSON_UNESCAPED_UNICODE) . "<br /> <br />";
    }

    /**
     * @交易详查询
     */
    public function transDetail()
    {
        $data = [
            'head' => [
                'txSno' => $this->orderId("txSno"),
                'mrchSno' => $this->orderId("mrchSno"),
                'bussSeqNo' => $this->orderId("bussSeqNo"),
                'txTime' => date("Y-m-d H:i:s"),
            ],
            'body' => [
                'mechNo'=>"8201908280041143",
                'oriInetNo'=>"da712d31f85dcbdca0690c596eeb36d5",
                'inetNo'=>$this->orderId(),
                'channelCode' => "CNJK020401",
                'userNo' => "CNJK020401",
            ],
        ];

        $res = $this->statusCityQuery($data,Yii::$app->params['JKTL']['transDetailUrl']);
        echo "----订单详情查询---- <br /> <br />";
        echo "----未加密参数---- <br /> <br />";
        echo json_encode($data,JSON_UNESCAPED_UNICODE) . "<br /> <br />";
        echo "----发送数据---- <br /> <br />";
        echo json_encode($res['data'],JSON_UNESCAPED_UNICODE) . "<br /> <br />";
        echo "----响应内容---- <br /> <br />";
        echo json_encode($res['res'],JSON_UNESCAPED_UNICODE) . "<br /> <br />";
    }

    /**
     * @交易详查询
     */
    public function transStatus()
    {
        $data = [
            'head' => [
                'txSno' => $this->orderId("txSno"),
                'mrchSno' => $this->orderId("mrchSno"),
                'bussSeqNo' => $this->orderId("bussSeqNo"),
                'txTime' => date("Y-m-d H:i:s"),
            ],
            'body' => [
                'mechNo'=>"8201908280041143",
                'inetNo'=>$this->orderId(),
                'sndTm'=>date("YmdHis")
            ],
        ];

        $res = $this->statusCityQuery($data,Yii::$app->params['JKTL']['transDetailUrl']);
        echo "----交易状态查询---- <br /> <br />";
        echo "----未加密参数---- <br /> <br />";
        echo json_encode($data,JSON_UNESCAPED_UNICODE) . "<br /> <br />";
        echo "----发送数据---- <br /> <br />";
        echo json_encode($res['data'],JSON_UNESCAPED_UNICODE) . "<br /> <br />";
        echo "----响应内容---- <br /> <br />";
        echo json_encode($res['res'],JSON_UNESCAPED_UNICODE) . "<br /> <br />";
    }


    public function setCode($code)
    {
        $this->code = $code;
    }


}
