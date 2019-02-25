<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\BookModel;

class BookController extends BaseController
{


    /**
     * 获取书籍列表
     */
    public function actionBooklist()
    {
        $bookmodel = new \app\models\BookModel();
        $booklist = $bookmodel->getBookList();

        $response=Yii::$app->response;
        $response->format=Response::FORMAT_JSON;
        $response->data=['code' => 0 ,'booklist' => $booklist];
    }

    /**
     * 书籍详情
     */
    public function actionBookdetail()
    {
        $bookid = Yii::$app->request->get('bookid',0);
        $bookmodel = new BookModel();
        $bookmodel->setBookid($bookid);
        $bookdetail = $bookmodel->getBooklDetail();

        Yii::jsonReturn(0,$bookdetail,'');
    }
}
