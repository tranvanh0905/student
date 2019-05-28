<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password_hash
 * @property string $full_name
 * @property int $gender
 * @property string $birthday
 * @property string $email
 * @property string $phone
 * @property int $status
 * @property int $role
 * @property int $created_at
 * @property int $updated_at
 * @property string $verification_token
 *
 * @property Class $class
 * @property Course[] $courses
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'full_name', 'gender', 'birthday', 'email', 'phone', 'created_at', 'updated_at'], 'required'],
            [['gender', 'status', 'role'], 'integer'],
            [['username', 'password_hash', 'full_name', 'email', 'phone', 'verification_token'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['phone'], 'unique'],
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
            'password_hash' => 'Password Hash',
            'full_name' => 'Full Name',
            'gender' => 'Gender',
            'birthday' => 'Birthday',
            'email' => 'Email',
            'phone' => 'Phone',
            'status' => 'Status',
            'role' => 'Role',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(ClassCourse::className(), ['student_id' => 'id']);
    }

    public function generateVerify()
    {
        $this->verification_token =  Yii::$app->security->generateRandomString() . '_' . time();
        return $this;
    }

    public function setPassword()
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($this->password_hash);
        return $this;
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
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
        return $this;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['user_id' => 'id']);
    }
}
