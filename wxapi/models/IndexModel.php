<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/10/13
 * Time: 21:39
 */

namespace app\models;


use yii\base\Model;
use app\models\table;

class IndexModel extends Model
{
    /**
     *
     */
    public function ad()
    {
        $tableAd = new table\Ad();
        $tableAd::find()->asArray()->all();
        var_dump($data);
        exit;
    }
}