<?php
//http://www.bsourcecode.com/yiiframework2/yii-2-user-login-from-database/
namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public $authKey;
    
    public static function tableName()
    {
        return 'userlogin_datakaryawan';
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id) {
        $idUserlogin = self::find()
                ->where(["id" => $id])
                ->one();

        return new static($idUserlogin);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $userType = null) {

        $user = self::find()
                ->where(["accessToken" => $token])
                ->one();
        if (!count($user)) {
            return null;
        }
        return new static($user);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        $userlogin = self::find()
                ->where([
                    "username" => $username
                ])
                ->one();
       
        return new static($userlogin);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    
    public function validatePassword($password)
    {
        try{
            $userlogin = Yii::$app->getSecurity()->validatePassword($password, $this->password);
            return $userlogin;
        } 
        
        catch(\yii\base\InvalidParamException $e){
            return false;
        }
    }
}
