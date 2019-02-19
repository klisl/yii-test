<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PollSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Polls';
?>

<div class="poll-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'name',
                'value' => function($searchModel){
                    return Html::a(
                        $searchModel->name,
                        ['poll/view', 'id' => $searchModel->id]
                    );

                },
                'format' => 'raw',
            ],
            'email:email',
            [
                'attribute' => 'created_at',
                'format' => 'date',
                'filter' => DateRangePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'created_at',
                    'convertFormat' => true,
                    'startAttribute' => 'date_from',
                    'endAttribute' => 'date_to',
                    'pluginOptions' => [
                        'locale' => [
                            'format' => 'Y-m-d',
                            'firstDay' => 1,
                        ],
                    ],
                ]),
            ],

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>
</div>
