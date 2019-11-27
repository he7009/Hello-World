<?php
/**
 * Created by PhpStorm.
 * User: 段育德
 * Date: 2019/11/25
 * Time: 17:51
 */

namespace app\controllers;


use yii\db\Exception;
use yii\web\Controller;

class Id3Controller extends Controller
{
    public function actionIndex()
    {
        try{
            $tag = id3_get_tag();
            echo 222;
            var_dump($tag);
            exit;
        }catch (\Error $e){
            return $e->getMessage();
        }

    }
}