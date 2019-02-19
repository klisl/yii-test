<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "poll_questions".
 *
 * @property int $id
 * @property string $question
 * @property boolean $active
 *
 * @property PollAnswers[] $pollAnswers
 */
class PollQuestions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'poll_questions';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPollAnswers()
    {
        return $this->hasMany(PollAnswers::class, ['poll_questions_id' => 'id']);
    }


}
