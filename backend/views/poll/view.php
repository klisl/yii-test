<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Poll */

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>

<div class="poll-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'email:email',
            'comment:ntext',
            'created_at:date',
        ],
    ]) ?>

    <h3><?= Yii::t('app', 'Answers on questions') ?></h3>
    <?php if(isset($model->pollAnswers)): ?>
        <?php foreach ($model->pollAnswers as $item): ?>
            <?= DetailView::widget([
                'model' => $item,
                'attributes' => [
                    [
                        'label' => Yii::t('app', 'Question'),
                        'value' => $item->pollQuestions->question,
                        'format' => 'raw',
                        'captionOptions' => ['width' => 300],
                    ],
                    'rating'
                ],
            ]) ?>
        <?php endforeach; ?>
    <?php endif; ?>

</div>
