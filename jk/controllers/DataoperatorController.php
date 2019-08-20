<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/20
 * Time: 23:31
 */

namespace app\controllers;


use yii\base\Controller;
use Yii;

class DataoperatorController extends Controller
{
    public function actionIndex()
    {
        //查询
        $data = Yii::$app->db->createCommand("select * from jk_test")->queryAll();
        $data = Yii::$app->db->createCommand("select * from jk_test")->queryOne();
        $data = Yii::$app->db->createCommand("select username,age from jk_test")->queryColumn();
        var_dump($data);

        //插入
        $insertdata = [];
        $insertdata['username'] = "贾宁";
        $insertdata['nickname'] = 'dfasfae dae';
        $insertdata['age'] = 0;
        $insertdata['addr'] = '江苏省 南京市 鼓楼区';
        Yii::$app->db->createCommand()->insert("jk_test",$insertdata)->execute();

        $insertdata = [];
        $insertdata[] = ['韩少阳','红闪',30,'山西 大同'];
        $insertdata[] = ['韩少阳','红闪',30,'山西 大同'];
        $insertdata[] = ['韩少阳','红闪',30,'山西 大同'];
        $insertdata[] = ['韩少阳','红闪',30,'山西 大同'];
        Yii::$app->db->createCommand()->batchInsert("jk_test",['username','nickname','age','addr'],$insertdata)->execute();

    }
}