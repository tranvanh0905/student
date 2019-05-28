<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "classCourse".
 *
 * @property int $id
 * @property string $class_no
 * @property int $student_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $student
 */
class classCourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'classCourse';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['class_no', 'status', 'created_at', 'updated_at'], 'required'],
            [['student_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['class_no'], 'string', 'max' => 255],
            [['class_no'], 'unique'],
            [['student_id'], 'unique'],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class_no' => 'Class No',
            'student_id' => 'Student ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(User::className(), ['id' => 'student_id']);
    }
}
