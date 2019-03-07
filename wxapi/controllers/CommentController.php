<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/3/1
 * Time: 7:33
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\CommentModel;

class CommentController extends BaseController
{
    /**
     * 添加书籍评论内容
     */
    public function actionAddcomment()
    {
        echo 222;die;
        Yii::info(33333333);
        Yii::info($this->userid);
        if(empty($this->userid)) Yii::jsonReturn('1001',[],'请登录');
        $bookid = Yii::$app->request->getPost('bookid',0);
        $comment = Yii::$app->request->getPost('content','');
        Yii::info($bookid);
        Yii::info($comment);
        if(empty($bookid)) Yii::jsonReturn('1002',[],'添加错误，请重试');
        if(empty($comment)) Yii::jsonReturn('1003',[],'评论内容为空');
        Yii::info($bookid);
        Yii::info($comment);
        $comment_model = new CommentModel();
        $comment_model->setBookid($bookid);
        $comment_model->setComment($comment);
        $comment_model->setUserid($this->userid);
        $insertid = $comment_model->addComment();
        Yii::info($insertid);

        if($insertid){
            Yii::jsonReturn(0,[],'SUCCESS');
        }else{
            Yii::jsonReturn(1004,[],'添加失败');
        }



    }
}