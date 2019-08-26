<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/21
 * Time: 22:49
 */

namespace app\models;

use Codeception\PHPUnit\ResultPrinter\HTML;
use yii\base\Model;
use Yii;

class TLBase extends Model
{
    public $token = '';

    /**
     * @return bool|mixed
     * @throws \yii\db\Exception
     */
    public function getToken()
    {
        $sql = "SELECT * FROM jk_token WHERE del = 0 ORDER BY id DESC limit 1";
        $tokenData = Yii::$app->db->createCommand($sql)->queryOne();
        if (!empty($tokenData) && strtotime($tokenData['expirationtime']) > time()) {
            return $tokenData['token'];
        }
        $seqNO = (string)rand(100000, 999999);
        $key = strtoupper(md5($this->getKey()));
        $data = [
            'appID' => Yii::$app->params['JKTL']['appId'],
            'seqNO' => $seqNO,
            'random' => strtoupper(md5($seqNO)),
            'rsaEncryptData' => Encrypt::rsaEncryptByPrivateKey($key, Yii::$app->params['JKTL']['jkPrivateKey']),
        ];
        $data['sign'] = strtoupper(md5($data['random'] . $data['seqNO'] . Yii::$app->params['JKTL']['appsecretkey'] . $key));
        $resStr = Http::post(Yii::$app->params['JKTL']['tokenUrl'], $data);
        $res = json_decode($resStr, true);
        $token = Encrypt::rsaDecryptByPublicKey($res['rsaEncryptData'], Yii::$app->params['JKTL']['TLPublicKey']);
        $sign = strtoupper(md5($data['random'] . $data['seqNO'] . $token . Yii::$app->params['JKTL']['appsecretkey']));
        if ($sign != $res['sign']) {
            Yii::error("Token 获取失败");
            Yii::error($data);
            Yii::error($resStr);
            return false;
        }
        $insertdata = [];
        $insertdata['token'] = $token;
        $insertdata['createtime'] = date("Y-m-d H:i:s");
        $insertdata['expirationtime'] = date("Y-m-d H:i:s",time() + Yii::$app->params['JKTL']['tokenTime']);
        Yii::$app->db->createCommand()->insert('jk_token', $insertdata)->execute();
        $this->token = $token;
        return $token;
    }

    /**
     * @发送请求
     * @param $array
     * @param $url
     * @return mixed|null
     */
    public function cityQuery($postData = [],$url,$name = '微信支付')
    {
        $jktl = Yii::$app->params['JKTL'];
        $json = json_encode($postData, JSON_UNESCAPED_UNICODE);
        $seqNO = (string)rand(100000,999999);
        $key = strtoupper(md5($this->getKey()));
        $data = [
            'appID' => $jktl['appId'],
            'seqNO' => $seqNO,
            'signMethod' => "MD5",
            'encryptMethod' => "AES",
            'appAccessToken'=> $this->getToken(),//获取token
            'rsaEncryptData' => Encrypt::rsaEncryptByPrivateKey($key, $jktl['jkPrivateKey']),
        ];
        $data['sign'] = strtoupper(md5($json . $data['seqNO'] .  $jktl['appsecretkey'] . $key));
        $aesKey = strtoupper(md5($data['seqNO'] . $data['appAccessToken'] . $jktl['appsecretkey'] . $key));
        $data['reqData'] = Encrypt::aesEncryptByKey($json,$aesKey,$jktl['iv']);
        echo "------传递参数------" . "<br /><br />";
        echo json_encode($data) . "<br /><br />";
        echo "------返回结果------" . "<br /><br />";
        $res = Http::curl($url,$data);
        echo $res . "<br /><br />";
        if($name == '支付宝'){
            $resArr = json_decode($res,true);
            if($resArr['errorCode'] == '000000'){
                $reskey = Encrypt::rsaDecryptByPublicKey($resArr['rsaEncryptData'],$jktl['TLPublicKey']);
                $aeskey = strtoupper(md5($resArr['seqNO'] . $data['appAccessToken'] . $jktl['appsecretkey'] . $reskey));
                $json = Encrypt::aesDecryptByKey($resArr['rspData'],$aeskey,$jktl['iv']);

                echo $res . "<br />";
                $resdata = json_decode($json,true);
                header('location:' . $resdata['body']['quickRspString']);
                exit;
            }
        }

        return $res;
    }

    /**
     * 解析响应
     */
    public function parseResponse()
    {

    }

    /**
     * @获取指定长度的随机字符串
     * @param int $length
     * @return string
     */
    private function getKey($length = 16)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $key = '';
        for ($i = 0; $i < $length; $i++) {
            $key .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $key;
    }


    /**
     * @获取32位随机字符串
     * @param string $string
     * @return string
     */
    public function orderId($string = '')
    {
        return md5(uniqid() . rand(100000,999999) . $string);
    }

    /**
     * @获取32位以内随机字符串
     * @return string
     */
    public function introId()
    {
        return 'JK' . date('YmdHis') . rand(100000,999999);
    }
}