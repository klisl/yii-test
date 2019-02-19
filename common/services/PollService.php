<?php

namespace common\services;

use common\models\PollAnswers;
use common\models\Poll;
use common\models\PollsForm;
use common\repositories\PollRepository;

class PollService
{
    private $repository;

    public function __construct(PollRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(PollsForm $form): void
    {
        $polls = new Poll();
        $polls->name = $form->name;
        $polls->email = $form->email;
        $polls->comment = $form->comment;

        $this->repository->savePoll($polls);

        foreach ($form->rating as $questionId => $answer){
            $pollAnswers = new PollAnswers();
            $pollAnswers->polls_id = $polls->id;
            $pollAnswers->poll_questions_id = $questionId;
            $pollAnswers->rating = $answer;

            $this->repository->savePollAnswers($pollAnswers);
        }

        /*
         * В реальном проекте для сохранения данных в связанные таблицы обычно использую расширение
         * la-haute-societe/yii2-save-relations-behavior
         */
    }
}