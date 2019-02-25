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

    public function getBooklDetail()
    {
        if(empty($this->bookid)) return [];
        $sql = " select * from wx_book where id = {$this->bookid}";
        $bookdetail = Yii::$app->db->createCommand($sql)->queryOne();
        foreach ($bookdetail as &$val){
            $val['coverurl_host'] = '';
        }
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
