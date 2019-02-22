<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginModel is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginModel extends Model
{
    /**
     * @js_code 微信登录临时code
     * @var string
     */
    private $code = '';

    private $rawData = '';

    /**
     * 登录获取 openID，session_key
     */
    public function toTogin()
    {
        $wxinfo = Yii::$app->params['wxapi'];
        $url = $wxinfo['loginurl'] . '?appid=' . $wxinfo['appid'] . '&secret=' . $wxinfo['appsecret'] . '&js_code=' . $this->code . "&grant_type=" . $wxinfo['grant_type'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        Yii::info($output);
        $output = json_decode($output,true);
        Yii::info($output);
        $openid = $output['openid'];
        $session_key = $output['session_key'];
        $sql = "select * from wx_user where wxopenid = '{$openid}'";
        $data = Yii::$app->db->createCommand($sql)->queryOne();
        Yii::info($data);
        if(empty($data)){
            $insertdata = [];
            $insertdata['wxopenid'] = $openid;
            $insertdata['wxname'] = $this->rawData['nickName'];
            $insertdata['gender'] = $this->rawData['gender'];
            $insertdata['avatar'] = $this->rawData['avatarUrl'];
            $insertdata['sessionkey'] = $session_key;
            $insertdata['createtime'] = date('Y-m-d H:i:s');
            $insertdata['updatetime'] = date('Y-m-d H:i:s');
            Yii::info($insertdata);
            Yii::$app->db->createCommand()->insert('wx_user',$insertdata)->execute();
        }
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
