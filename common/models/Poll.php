<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "polls".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $comment
 * @property int $created_at
 * @property ActiveQuery $pollAnswers
 */
class Poll extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'polls';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'time' => [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => null
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'question' => 'Question',
            'rating' => 'Rating',
            'comment' => 'Comment',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getPollAnswers()
    {
        return $this->hasMany(PollAnswers::class, ['polls_id' => 'id']);
    }
}
