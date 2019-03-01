<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/3/1
 * Time: 7:38
 */

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\BaseModel;

class CommentModel extends BaseModel
{
    /**
     * @var int
     */
    private $bookid = 0;

    /**
     * @var string
     */
    private $comment = '';

    /**
     * @var int
     */
    private $userid = 0;

    public function addComment()
    {
        $insertdata = [];
        $insertdata['uid'] = $this->userid;
        $insertdata['bookid'] = $this->bookid;
        $insertdata['content'] = $this->comment;
        $insertdata['createtime'] = date('Y-m-d H:i:s');
        Yii::info($insertdata);
        Yii::$app->db->createCommand()->insert('wx_comment',$insertdata)->execute();
        Yii::info(Yii::$app->db->createCommand()->getSql());
        return Yii::$app->db->getLastInsertID();
    }



    /**
     * @return int
     */
    public function getBookid()
    {
        return $this->bookid;
    }

    /**
     * @param int $bookid
     */
    public function setBookid($bookid)
    {
        $this->bookid = $bookid;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
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
        $this->userid = $userid;
    }
}