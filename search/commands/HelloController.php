<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionAdd($message = 'hello world')
    {
        /**
         * // 返回多行. 每行都是列名和值的关联数组.
         * // 如果该查询没有结果则返回空数组
         * $posts = Yii::$app->db->createCommand('SELECT * FROM post')->queryAll();
         *
         * // 返回一行 (第一行)
         * // 如果该查询没有结果则返回 false
         * $post = Yii::$app->db->createCommand('SELECT * FROM post WHERE id=1')->queryOne();

         * // 返回一列 (第一列)
         * // 如果该查询没有结果则返回空数组
         * $titles = Yii::$app->db->createCommand('SELECT title FROM post')->queryColumn();

         * // 返回一个标量值
         * // 如果该查询没有结果则返回 false
         * $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM post')->queryScalar();
         *
         */

        $data = Yii::$app->db->createCommand('select * from search_test')->queryOne();
        var_export($data);
    }

    /**
     * 插入数据
     */
    public function actionInsert()
    {
        $inseardata = [];
        for($i = 1;$i <= 10;$i++){
            $inseardata[] = ['段育德'];
        }
        Yii::$app->db->createCommand()->batchInsert('search_test',['name'],$inseardata)->execute();
    }

    /**
     * 更新数据
     */
    public function actionUpdate()
    {
        $updatedata = [];
        $updatedata['name'] = '段育德';
        Yii::$app->db->createCommand()->update('search_test',$updatedata,'id > 10')->execute();
    }

    public function actionDelete()
    {
        Yii::$app->db->createCommand()->delete('search_test','id > 15')->execute();
    }

    public function actionModel()
    {
        $test_model = new \app\models\Test();
        $test_model->tuceshi();
    }


}
