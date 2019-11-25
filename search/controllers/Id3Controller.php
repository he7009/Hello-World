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
            var_dump($tag);
            exit;
        }catch (\Exception $e){
            return $e->getMessage();
        }

    }
}