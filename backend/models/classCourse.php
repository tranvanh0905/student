<?php

namespace backend\models;

use Yii;
use common\models\User;

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
            [['class_no', 'status'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['class_no'], 'string', 'max' => 255],
            [['class_no'], 'unique'],
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

    public function get_created_at()
    {
        $this->created_at = Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');
        return $this;
    }

    public function get_updated_at()
    {
        $this->updated_at = Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');
        return $this;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(User::className(), ['id' => 'student_id']);
    }

}
