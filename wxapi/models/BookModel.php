<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\BaseModel;

/**
 * BookModel is the model behind the contact form.
 */
class BookModel extends BaseModel
{

    private $bookid;
    /**
     * 获取书籍列表
     */
    public function getBookList()
    {
        $sql = " select * from wx_book";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    /**
     * @获取书籍详情信息
     * @return array|false
     * @throws \yii\db\Exception
     */
    public function getBooklDetail()
    {
        if(empty($this->bookid)) return [];
        $sql = " select * from wx_book where id = {$this->bookid}";
        $bookdetail = Yii::$app->db->createCommand($sql)->queryOne();
        $bookdetail['coverurl_host'] = Yii::$app->params['bookimgurlhost'].$bookdetail['coverurl'];
        return $bookdetail;
    }

    /**
     * @获取评论列表
     * @return array
     * @throws \yii\db\Exception
     */
    public function getBookCommentlist()
    {
        if(empty($this->bookid)) return [];
        $sql = "SELECT a.bookid,a.content,a.createtime,a.uid,a.id,b.wxname,b.avatar FROM wx_comment as a LEFT JOIN wx_user as b ON a.uid = b.id WHERE a.bookid = {$this->bookid}";
        $commentlist = Yii::$app->db->createCommand($sql)->queryAll();
        return $commentlist;
    }

    /**
     * @return mixed
     */
    public function getBookid()
    {
        return $this->bookid;
    }

    /**
     * @param mixed $bookid
     */
    public function setBookid($bookid)
    {
        $this->bookid = intval($bookid);
    }


}
