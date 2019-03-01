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
     * �����û���Ż�ȡ�û���Ϣ
     */
    public function getUserInfoByUserid()
    {
        if(empty($this->userid)) return [];
        $sql = "select * from wx_user where id = {$this->userid}";
        $userinfo = Yii::$app->db->createCommand($sql)->queryOne();
        return $userinfo;
    }

    /**
     * �����Զ����¼��ʶ��ȡ��Ϣ
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
     * ����openid��ȡ�û���Ϣ
     */
    public function getUserInfoByOpenid()
    {
        if(empty($this->openid)) return [];
        $sql = " select * from wx_user where wxopenid = '{$this->openid}'";
        $useinfo = Yii::$app->db->createCommand($sql)->queryOne();
        return $useinfo;
    }

    /**
     * ��ȡ�û������鼮�б�
     */
    public function getUserBookList()
    {
        if(empty($this->userid)) return [];
        $sql = " select a.uid,a.price,a.createtime,b.name,b.author,b.publisher,b.coverurl from wx_order as a left join wx_book as b on a.bookid = b.id where uid = {$this->userid}";
        $booklist = Yii::$app->db->createCommand($sql)->queryAll();
        return $booklist;
    }

    /**
     * ���ƴ���û�ͷ��
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
