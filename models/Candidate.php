<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "candidate".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_by
 * @property string $updated_at
 *
 * @property User $user
 * @property Vote[] $votes
 */
class Candidate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'candidate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'name' => 'Name',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Votes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVotes()
    {
        return $this->hasMany(Vote::class, ['candidate_id' => 'id']);
    }
}
