<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\AnswerQuestions */
/* @var $form yii\widgets\ActiveForm */

$model->service_id = $service_id['id'];
?>

<div class="answer-questions-form">
   <?php $form = ActiveForm::begin([
       'action' => '/admin/answer-questions/create',
       'enableClientValidation' => true,
       'enableAjaxValidation' => true
   ]); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'question')->textarea(['rows' => 4, 'required' => true, 'id' => 'drop']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'answer')->textarea(['maxlength' => true, 'rows' => 4]) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 ">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="col-lg-6 ">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'type')->dropDownList(['1' => 'Общий', '0' => 'Пользовательский']) ?>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'status')->dropDownList(['1' => 'Включен', '0' => 'Отключен']) ?>
            </div>
        </div>
    </div>
    <div class="col-lg-12  text-center">
       <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink']) ?>
    </div>
   <?= $form->field($model, 'service_id')->hiddenInput(['value' => $service_id['id']])->label(false) ?>
   <?php ActiveForm::end(); ?>
</div>
