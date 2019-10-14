<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "{{%ad}}".
 *
 * @property int $id
 * @property int $ad_position_id
 * @property int $media_type
 * @property string $name
 * @property string $link
 * @property string $image_url
 * @property string $content
 * @property int $end_time
 * @property int $enabled
 */
class Ad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ad}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ad_position_id', 'media_type', 'end_time', 'enabled'], 'integer'],
            [['image_url'], 'required'],
            [['image_url'], 'string'],
            [['name'], 'string', 'max' => 60],
            [['link', 'content'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ad_position_id' => 'Ad Position ID',
            'media_type' => 'Media Type',
            'name' => 'Name',
            'link' => 'Link',
            'image_url' => 'Image Url',
            'content' => 'Content',
            'end_time' => 'End Time',
            'enabled' => 'Enabled',
        ];
    }
}
