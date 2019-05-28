<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "class_user".
 *
 * @property int $id
 * @property int $user_id
 * @property int $class_id
 * @property string $date_start
 *
 * @property ClassCourse $class
 * @property User $user
 */
class ClassUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'class_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'class_id', 'date_start'], 'required'],
            [['user_id', 'class_id'], 'integer'],
            [['date_start'], 'safe'],
            [['class_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClassCourse::className(), 'targetAttribute' => ['class_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'class_id' => 'Class ID',
            'date_start' => 'Date Start',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(ClassCourse::className(), ['id' => 'class_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}
