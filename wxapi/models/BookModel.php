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
    /**
     * 获取书籍列表
     */
    public function getBookList()
    {
        $sql = " select * from wx_book";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }
}
