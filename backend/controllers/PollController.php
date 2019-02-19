<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\repositories\PollRepository;
use backend\models\PollSearch;

class PollController extends Controller
{
    private $repository;

    public function __construct(string $id, $module, PollRepository $repository, $config = [])
    {
        $this->repository = $repository;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $searchModel = new PollSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $poll = $this->repository->getAllPoll($id);

        return $this->render('view', [
            'model' => $poll,
        ]);
    }

}
