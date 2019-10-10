<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\RequisitesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requisites-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'legal_address') ?>

    <?= $form->field($model, 'mailing_address') ?>

    <?= $form->field($model, 'inn') ?>

    <?= $form->field($model, 'kpp') ?>

    <?php // echo $form->field($model, 'rs') ?>

    <?php // echo $form->field($model, 'ks') ?>

    <?php // echo $form->field($model, 'okpo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
