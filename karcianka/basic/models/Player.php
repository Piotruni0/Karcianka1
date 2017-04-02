<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "player".
 *
 * @property integer $id
 * @property string $username
 * @property string $authKey
 * @property string $password
 * @property string $email
 */
class Player extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'player';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
                   [['id', 'username', 'authKey', 'password', 'email'], 'required'],
                   [['id'], 'integer'],
                   [['username', 'authKey', 'password'], 'string', 'max' => 45],
                   [['email'], 'string', 'max' => 55],
                   [['username'], 'unique'],
                   [['authKey'], 'unique'],
                   [['email'], 'unique'],
               ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
                   'id' => Yii::t('app', 'ID'),
                   'username' => Yii::t('app', 'Username'),
                   'authKey' => Yii::t('app', 'Auth Key'),
                   'password' => Yii::t('app', 'Password'),
                   'email' => Yii::t('app', 'Email'),
               ];
    }

    public function getAuthKey() {
        return $this->authKey;//Here I return a value of my authKey column
    }
    public function getId() {
        return $this->id;
    }

    public function validateAuthKey($authKey) {
        return $this->authKey === $authKey;
    }

    public static function findIdentity($id) {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException();//I don't implement this method because I don't have any access token column in my database
    }

    public static function findByUsername($username){
		return self::findOne(['username'=>$username]);
	}

  public function validatePassword($password){
  return $this->password === md5($password);
}
}
