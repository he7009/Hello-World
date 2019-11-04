<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "search_user".
 *
 * @property int $id 自增编号
 * @property string $username 用户昵称
 * @property string $passwd 用户密码
 * @property string $loginname 登录名称
 * @property string $createtime 创建时间
 */
class SearchUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'search_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['createtime'], 'safe'],
            [['username', 'loginname'], 'string', 'max' => 50],
            [['passwd'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'passwd' => 'Passwd',
            'loginname' => 'Loginname',
            'createtime' => 'Createtime',
        ];
    }
}
