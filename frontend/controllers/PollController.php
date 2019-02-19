<?php

namespace frontend\controllers;

use common\models\PollsForm;
use common\repositories\PollRepository;
use common\services\PollService;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class PollController extends Controller
{
    private $service;
    private $repository;

    public function __construct(string $id, $module, PollService $service, PollRepository $repository, $config = [])
    {
        $this->service = $service;
        $this->repository = $repository;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $form = new PollsForm();
        $questions = $this->repository->getQuestions();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->create($form);
                Yii::$app->session->setFlash('success', 'Thank. Data saved.');
                return $this->redirect(Url::home());
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash($e->getMessage());
            }
        }

        return $this->render('index', [
            'model' => $form,
            'questions' => $questions
        ]);
    }
}