<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vote".
 *
 * @property int $id
 * @property int $user_id
 * @property int $candidate_id
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_by
 * @property string $updated_at
 *
 * @property Candidate $candidate
 * @property User $user
 */
class Vote extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vote';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'candidate_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['user_id', 'candidate_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'string', 'max' => 255],
            [['candidate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Candidate::class, 'targetAttribute' => ['candidate_id' => 'id']],
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
            'candidate_id' => 'Candidate ID',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Candidate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCandidate()
    {
        return $this->hasOne(Candidate::class, ['id' => 'candidate_id']);
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
}
