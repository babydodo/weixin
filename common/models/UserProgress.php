<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_progress".
 *
 * @property int $id
 * @property int $user_id 用户ID
 * @property int $progress_id 进度ID
 * @property int $created_time 创建时间
 *
 * @property User $user
 * @property Progress $progress
 */
class UserProgress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_progress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'progress_id', 'created_time'], 'required'],
            [['user_id', 'progress_id', 'created_time'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['progress_id'], 'exist', 'skipOnError' => true, 'targetClass' => Progress::className(), 'targetAttribute' => ['progress_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '用户ID',
            'progress_id' => '进度ID',
            'created_time' => '创建时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgress()
    {
        return $this->hasOne(Progress::className(), ['id' => 'progress_id']);
    }
}
