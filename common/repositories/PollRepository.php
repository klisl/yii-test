<?php

namespace common\repositories;

use common\models\PollAnswers;
use common\models\PollQuestions;
use common\models\Poll;

class PollRepository
{
    public function savePoll(Poll $poll): void
    {
        if(!$poll->save($poll)){
            throw new \RuntimeException('Poll saving error.');
        }
    }

    public function savePollAnswers(PollAnswers $pollAnswers): void
    {
        if(!$pollAnswers->save($pollAnswers)){
            throw new \RuntimeException('Answers saving error.');
        }
    }

    /**
     * @return PollQuestions[]
     */
    public function getQuestions()
    {
        return PollQuestions::find()->where(['active' => true])->indexBy('id')->all();
    }

    /**
     * @param int $id
     * @return Poll
     */
    public function getAllPoll(int $id)
    {
        $query = Poll::find()
            ->alias('p')
            ->where(['p.id' => $id]);

        $query = $query->joinWith([
            'pollAnswers',
            'pollAnswers.pollQuestions'
        ]);

        return $query->limit(1)->one();
    }
}