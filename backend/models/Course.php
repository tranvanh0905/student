<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property int $class_id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 * @property int $user_id
 *
 * @property Classcourse $class
 * @property User $user
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['class_id', 'created_at', 'updated_at', 'user_id'], 'required'],
            [['class_id', 'user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['title'], 'unique'],
            [['class_id'], 'exist', 'skipOnError' => true, 'targetClass' => Classcourse::className(), 'targetAttribute' => ['class_id' => 'id']],
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
            'class_id' => 'Class ID',
            'title' => 'Title',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(Classcourse::className(), ['id' => 'class_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
