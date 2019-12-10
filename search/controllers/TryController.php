<?php


namespace app\controllers;


use yii\web\Controller;

class TryController extends Controller
{
    public function actionIndex()
    {
        try{
//            $db = new \yii\db\Query();
//            $data = $db->select("username,createtime")->from("search_user")->all();
//            var_dump($data);
            $insertData = [
                'username' => 'Sam',
                'passwd' => md5("123456"),
                'loginname' => "sam1",
                'createtime' => date("Y-m-d H:i:s"),
            ];
            \Yii::$app->db->createCommand()->insert('search_user',$insertData) ->execute();
            $insertData = ["ddd" => 222];
            \Yii::$app->db->createCommand()->insert('search_user',$insertData) ->execute();

            echo "SUCCESS";
        }catch (\Exception $e){
            var_dump($e);
            echo $e->getMessage();
            echo "哈哈哈，我捕获到了异常";
        }
    }
}