<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userlogin_datakaryawan".
 *
 * @property string|null $username
 * @property string|null $password
 *
 * @property Datakaryawan $username0
 */
class Userlogin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userlogin_datakaryawan';
    }

    public static function primaryKey()
    {
        return ['username'];
    }

    public $password_repeat;
    public $namaKaryawan;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'required', 'message' => 'Silahkan pilih username yang ingin diregistrasi!'],
            ['password', 'required', 'message' => 'Silahkan isi password anda!'],
            [['username'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 128],
            [['username'], 'exist', 'skipOnError' => true, 'targetClass' => Datakaryawan::className(), 'targetAttribute' => ['username' => 'username']],
            
            ['password_repeat', 'required', 'message' => 'Silahkan isi password anda sesuai dengan di atas!'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => "Pastikan Password anda sudah cocok dan benar!" ],
        ];
    }

    //https://stackoverflow.com/questions/40372803/yii2-hashing-password-register-and-signing-in
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
           // $this->password = Yii::$app->security->generatePasswordHash($this->password);
            $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            return true;
        } else {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
            'password_repeat' => 'Confirm Password',
        ];
    }

    /**
     * Gets query for [[Username0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsername0()
    {
        return $this->hasOne(Datakaryawan::className(), ['username' => 'username']);
    }
}
