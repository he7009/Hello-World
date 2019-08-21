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
     * @获取TLtoken
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
        $insertdata['createtime'] = time();
        $insertdata['expirationtime'] = time() + Yii::$app->params['JKTL']['tokenTime'];
        Yii::$app->db->createCommand()->insert('jk_token', $insertdata);
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
        $json = json_encode($postData, JSON_UNESCAPED_UNICODE);
        $seqNO = (string)rand(100000,999999);
        $key = strtoupper(md5($this->getKey()));
        $data = [
            'appID' => $this->config['appId'],
            'seqNO' => $seqNO,
            'signMethod' => "MD5",
            'encryptMethod' => "AES",
            'appAccessToken'=> $this->getToken(),//获取token
            'rsaEncryptData' => Encrypt::rsaEncryptByPrivateKey($key, Yii::$app->params['JKTL']['jkPrivateKey']),
        ];
        //拼接签名字段
        $data['sign'] = strtoupper(md5($json . $data['seqNO'] .  Yii::$app->params['JKTL']['appsecretkey'] . $key));
        //AES加密业务数据
        $data['reqData'] = $this->encrypt($json,strtoupper(md5($data['seqNO'] . $data['appAccessToken'] . $this->config['appsecretkey'] . $key)));
        echo "-------Request Data-------" . PHP_EOL;
        var_dump($data);
        $res = http::curl($url,$data);
        return $res;
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
}