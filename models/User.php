<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_by
 * @property string $updated_at
 *
 * @property Candidate[] $candidates
 * @property Vote[] $votes
 */
class User extends ActiveRecord implements IdentityInterface
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
            [['username', 'password', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password', 'created_by', 'updated_by', 'auth_key'], 'string', 'max' => 255],
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
            'password' => 'Password',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Candidates]].
     *
     * @return ActiveQuery
     */
    public function getCandidates()
    {
        return $this->hasOne(Candidate::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Votes]].
     *
     * @return ActiveQuery
     */
    public function getVote()
    {
        return $this->hasOne(Vote::class, ['user_id' => 'id']);
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['auth_key' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $authKey === $this->auth_key;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }
}
