<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\PollsForm */
/* @var $questions \common\models\PollQuestions[] */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Questioning');
?>

<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Yii::t('app', 'Fill out the form please.') ?>
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput() ?>

            <?= $form->field($model, 'email') ?>

            <br>
            <div>
                <h4><?= Yii::t('app', 'Answer some questions please.') ?></h4>
                (<?= Yii::t('app', '0 - definitely not, 10 - of course yes') ?>)
            </div>
            <br>

            <?php foreach ($questions as $i => $question): ?>
                <div class="row">
                    <div class="col-xs-7">
                        <b><?= $question->question ?></b>
                        <br>

                    </div>
                    <div class="col-xs-5">
                        <?= $form->field($model, 'rating[' . $i .']')->dropDownList($model->ratingList(), ['prompt' => ''])->label(false) ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <br>

            <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>

