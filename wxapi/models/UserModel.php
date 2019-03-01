<?php

namespace app\models;
use app\models\BaseModel;
use Yii;

class UserModel extends BaseModel
{
    private $userid = 0;

    private $skey = '';

    private $openid = '';

    public function __construct($userid = 0)
    {
        $this->userid = intval($userid);
    }

    /**
     * 根据用户编号获取用户信息
     */
    public function getUserInfoByUserid()
    {
        if(empty($this->userid)) return [];
        $sql = "select * from wx_user where id = {$this->userid}";
        $userinfo = Yii::$app->db->createCommand($sql)->queryOne();
        return $userinfo;
    }

    /**
     * 根据自定义登录标识获取信息
     */
    public function getUserInfoBySkey()
    {
        if(empty($this->skey)) return [];
        $sql = " select * from wx_user where skey = '{$this->skey}'";
        Yii::info(Yii::$app->db->createCommand()->getSql());
        $userinfo = Yii::$app->db->createCommand($sql)->queryOne();
        Yii::info($userinfo);
        return $userinfo;
    }

    /**
     * 根据openid获取用户信息
     */
    public function getUserInfoByOpenid()
    {
        if(empty($this->openid)) return [];
        $sql = " select * from wx_user where wxopenid = '{$this->openid}'";
        $useinfo = Yii::$app->db->createCommand($sql)->queryOne();
        return $useinfo;
    }

    /**
     * 获取用户购买书籍列表
     */
    public function getUserBookList()
    {
        if(empty($this->userid)) return [];
        $sql = " select a.uid,a.price,a.createtime,b.name,b.author,b.publisher,b.coverurl from wx_order as a left join wx_book as b on a.bookid = b.id where uid = {$this->userid}";
        $booklist = Yii::$app->db->createCommand($sql)->queryAll();
        return $booklist;
    }

    /**
     * 组合拼接用户头像
     */
    public static function combineUserAvatar($url)
    {
        $host = Yii::$app->params['bookimgurlhost'];
        return $host.$url;
    }

    /**
     * @return int
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param int $userid
     */
    public function setUserid($userid)
    {
        $this->userid = intval($userid);
    }

    /**
     * @return string
     */
    public function getSkey()
    {
        return $this->skey;
    }

    /**
     * @param string $skey
     */
    public function setSkey($skey)
    {
        $this->skey = $skey;
    }

    /**
     * @return string
     */
    public function getOpenid()
    {
        return $this->openid;
    }

    /**
     * @param string $openid
     */
    public function setOpenid($openid)
    {
        $this->openid = $openid;
    }

}
