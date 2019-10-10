<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Requisites */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requisites-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'legal_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mailing_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'okpo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
