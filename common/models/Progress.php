<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "progress".
 *
 * @property int $id
 * @property string $name 进度名称
 * @property int $sort 排序
 * @property int $created_time 创建时间
 * @property int $updated_time 修改时间
 *
 * @property UserProgress[] $userProgresses
 */
class Progress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'progress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'created_time', 'updated_time'], 'required'],
            [['sort', 'created_time', 'updated_time'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '进度名称',
            'sort' => '排序',
            'created_time' => '创建时间',
            'updated_time' => '修改时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProgresses()
    {
        return $this->hasMany(UserProgress::className(), ['progress_id' => 'id']);
    }
}
