<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginModel is the model behind the login form.
 *
 * @property UserModel|null $user This property is read-only.
 *
 */
class LoginModel extends Model
{
    /**
     * @js_code 微信登录临时code
     * @var string
     */
    private $code = '';

    /**
     * @var string
     */
    private $rawData = '';

    /**
     * @var string
     */
    private $openid = '';

    /**
     * @var string
     */
    private $session_key = '';

    /**
     * 登录获取 openID，session_key
     */
    public function toTogin()
    {
        $output = $this->toWxCheck();
        $this->openid = $openid = $output['openid'];
        $this->session_key = $session_key = $output['session_key'];
        $skey = $this->createSkey();
        $usermodel = new \app\models\UserModel();
        $usermodel->setOpenid($this->openid);
        $userinfo = $usermodel->getUserInfoByOpenid();
        if(empty($userinfo)){
            $insertdata = [];
            $insertdata['wxopenid'] = $openid;
            $insertdata['wxname'] = $this->rawData['nickName'];
            $insertdata['gender'] = $this->rawData['gender'];
            $insertdata['avatar'] = $this->rawData['avatarUrl'];
            $insertdata['skey'] = $skey;
            $insertdata['sessionkey'] = $session_key;
            $insertdata['createtime'] = date('Y-m-d H:i:s');
            $insertdata['updatetime'] = date('Y-m-d H:i:s');
            Yii::info($insertdata);
            Yii::$app->db->createCommand()->insert('wx_user',$insertdata)->execute();
            $userid = Yii::$app->db->getLastInsertID();
            $userinfo['id'] = $userid;
            $userinfo['wxname'] = $this->rawData['nickName'];
        }else{
            $updatedata = [];
            $updatedata['wxname'] = $this->rawData['nickName'];
            $updatedata['gender'] = $this->rawData['gender'];
            $updatedata['avatar'] = $this->rawData['avatarUrl'];
            $updatedata['skey'] = $skey;
            $updatedata['sessionkey'] = $session_key;
            $updatedata['updatetime'] = date('Y-m-d H:i:s');
            Yii::$app->db->createCommand()->update('wx_user',$updatedata,"wxopenid='{$openid}'")->execute();
        }
        return ['userinfo' => $userinfo,'skey' => $skey];
    }

    /**
     * 接收到code到微信验证信息
     */
    public function toWxCheck()
    {
        $wxinfo = Yii::$app->params['wxapi'];
        $url = $wxinfo['loginurl'] . '?appid=' . $wxinfo['appid'] . '&secret=' . $wxinfo['appsecret'] . '&js_code=' . $this->code . "&grant_type=" . $wxinfo['grant_type'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        $output = curl_exec($ch);
        curl_close($ch);
        $output = json_decode($output,true);
        return $output;
    }

    /**
     * 创建登录标识
     */
    public function createSkey()
    {
        $str = uniqid(microtime(true),true);
        return md5(md5($str) . $this->openid);
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getRawData()
    {
        return $this->rawData;
    }

    /**
     * @param string $rawData
     */
    public function setRawData($rawData)
    {
        $this->rawData = json_decode($rawData,true);
    }

}
