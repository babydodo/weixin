<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "immigration_instruction".
 *
 * @property int $id
 * @property string $country_name 国家名称
 * @property string $image 图片地址
 * @property string $content 移民介绍
 * @property int $sort 排序
 * @property int $created_time 创建时间
 * @property int $updated_time 修改时间
 */
class ImmigrationInstruction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'immigration_instruction';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_name', 'sort'], 'trim'],
            ['country_name', 'required'],
            [['content'], 'string'],
            [['sort', 'created_at', 'updated_at'], 'integer'],
            ['image', 'file', 'skipOnEmpty' => true, 'extensions' => ['png', 'jpg'], 'checkExtensionByMimeType' => false],
            ['country_name', 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_name' => '国家名称',
            'image' => '图片',
            'content' => '移民介绍',
            'sort' => '排序',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }

    /**
     * 验证场景
     * @return array
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['update'] = ['country_name', 'content', 'sort'];
        return $scenarios;
    }

}
