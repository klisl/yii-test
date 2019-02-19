<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "poll_answers".
 *
 * @property int $id
 * @property int $polls_id
 * @property int $poll_questions_id
 * @property int $rating
 *
 * @property PollQuestions $pollQuestions
 * @property Poll $polls
 */
class PollAnswers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'poll_answers';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPollQuestions()
    {
        return $this->hasOne(PollQuestions::class, ['id' => 'poll_questions_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPolls()
    {
        return $this->hasOne(Poll::class, ['id' => 'polls_id']);
    }
}
