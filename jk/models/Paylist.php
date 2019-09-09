<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/22
 * Time: 6:46
 */

namespace app\models;


use yii\base\Model;
use \Yii;

class Paylist extends Model
{
    private $paystatus = 0;

    public function getPayList()
    {
        $sql = " SELECT * FROM jk_pay ORDER BY id DESC  limit 40 ";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }


    /**
     * @return int
     */
    public function getPaystatus()
    {
        return $this->paystatus;
    }

    /**
     * @param int $paystatus
     */
    public function setPaystatus($paystatus)
    {
        $this->paystatus = $paystatus;
    }
}