<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/21
 * Time: 22:49
 */

namespace app\models;

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
        $jktl = Yii::$app->params['JKTL'];
        $sql = "SELECT * FROM jk_token WHERE del = 0 ORDER BY id DESC limit 1";
        $tokenData = Yii::$app->db->createCommand($sql)->queryOne();
        if (!empty($tokenData) && strtotime($tokenData['expirationtime']) > time()) {
            return $tokenData['token'];
        }
        $seqNO = (string)rand(100000, 999999);
        $key = strtoupper(md5($this->getKey()));
        $data = [
            'appID' => $jktl['appId'],
            'seqNO' => $seqNO,
            'random' => strtoupper(md5($seqNO)),
            'rsaEncryptData' => Encrypt::rsaEncryptByPrivateKey($key, $jktl['jkPrivateKey']),
        ];
        $data['sign'] = strtoupper(md5($data['random'] . $data['seqNO'] . $jktl['appsecretkey'] . $key));
        $resStr = Http::post($jktl['tokenUrl'], $data);
        $res = json_decode($resStr, true);
        $token = Encrypt::rsaDecryptByPublicKey($res['rsaEncryptData'], $jktl['TLPublicKey']);
        $sign = strtoupper(md5($data['random'] . $data['seqNO'] . $token . $jktl['appsecretkey']));
        if ($sign != $res['sign']) {
            Yii::error("Token 获取失败");
            Yii::error($data);
            Yii::error($resStr);
            echo "Token 获取失败，请联系客服！";
            exit;
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
    public function cityQuery($postData = [],$url)
    {
        $this->createPay($postData);
        $jktl = Yii::$app->params['JKTL'];
        $json = json_encode($postData, JSON_UNESCAPED_UNICODE);
        $seqNO = (string)rand(100000,999999);
        $key = strtoupper(md5($this->getKey()));
        $token = $this->getToken();
        $data = [
            'appID' => $jktl['appId'],
            'seqNO' => $seqNO,
            'signMethod' => "MD5",
            'encryptMethod' => "AES",
            'appAccessToken'=> $token,
            'rsaEncryptData' => Encrypt::rsaEncryptByPrivateKey($key, $jktl['jkPrivateKey']),
        ];
        $data['sign'] = strtoupper(md5($json . $data['seqNO'] .  $jktl['appsecretkey'] . $key));
        $aesKey = strtoupper(md5($data['seqNO'] . $data['appAccessToken'] . $jktl['appsecretkey'] . $key));
        $data['reqData'] = Encrypt::aesEncryptByKey($json,$aesKey,$jktl['iv']);
        $res = Http::curl($url,$data);
        $resArr = json_decode($res,true);
        if($resArr['errorCode'] == '000000'){
            $reskey = Encrypt::rsaDecryptByPublicKey($resArr['rsaEncryptData'],$jktl['TLPublicKey']);
            $aeskey = strtoupper(md5($resArr['seqNO'] . $data['appAccessToken'] . $jktl['appsecretkey'] . $reskey));
            $json = Encrypt::aesDecryptByKey($resArr['rspData'],$aeskey,$jktl['iv']);
            $resdata = json_decode($json,true);
            if(is_array($resdata) && $resdata){
                $this->updatePay($res,2);
                return $resdata;
            }
        }
        $this->updatePay($res,3);
        return $res;
    }

    /**
     * @发送请求
     * @param $array
     * @param $url
     * @return mixed|null
     */
    public function statusCityQuery($postData = [],$url)
    {
        $jktl = Yii::$app->params['JKTL'];
        $json = json_encode($postData, JSON_UNESCAPED_UNICODE);
        $seqNO = (string)rand(100000,999999);
        $key = strtoupper(md5($this->getKey()));
        $token = $this->getToken();
        $data = [
            'appID' => $jktl['appId'],
            'seqNO' => $seqNO,
            'signMethod' => "MD5",
            'encryptMethod' => "AES",
            'appAccessToken'=> $token,
            'rsaEncryptData' => Encrypt::rsaEncryptByPrivateKey($key, $jktl['jkPrivateKey']),
        ];
        $data['sign'] = strtoupper(md5($json . $data['seqNO'] .  $jktl['appsecretkey'] . $key));
        $aesKey = strtoupper(md5($data['seqNO'] . $data['appAccessToken'] . $jktl['appsecretkey'] . $key));
        $data['reqData'] = Encrypt::aesEncryptByKey($json,$aesKey,$jktl['iv']);
        $res = Http::curl($url,$data);
        $result = [];
        $result['data'] = $data;
        $result['res'] = $res;
        return $result;
    }

    /**
     * @创建支付订单
     * @param $reqData
     * @throws \yii\db\Exception
     */
    public function createPay($reqData)
    {
        $insertData = [];
        $insertData['uid'] = isset($reqData['body']['clntSbtpId']) ? $reqData['body']['clntSbtpId'] : '';
        $insertData['accttye'] = intval($reqData['body']['acctType']);
        $insertData['mechno'] = $reqData['body']['mechNo'];
        $insertData['inetno'] = $reqData['body']['inetNo'];
        $insertData['txsno'] = $reqData['head']['txSno'];
        $insertData['mrchsno'] = $reqData['head']['mrchSno'];
        $insertData['txtime'] = $reqData['head']['txTime'];
        $insertData['payamount'] = $reqData['body']['payAmount'];
        $insertData['reqdata'] = json_encode($reqData,JSON_UNESCAPED_UNICODE);
        $insertData['resdata'] = '';
        $insertData['paystatus'] = 1;
        $insertData['createtime'] = date('Y-m-d H:i:s');
        $insertData['updatetime'] = date('Y-m-d H:i:s');

        Yii::$app->db->createCommand()->insert("jk_pay",$insertData)->execute();
    }

    /**
     * @更新支付订单
     * @param $res
     * @param $paystatus
     * @throws \yii\db\Exception
     */
    public function updatePay($res,$paystatus)
    {
        $updateData = [];
        $updateData['resdata'] = $res;
        $updateData['paystatus'] = $paystatus;
        Yii::$app->db->createCommand()->update("jk_pay",$updateData)->execute();
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