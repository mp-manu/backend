<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\WorkResults */
/* @var $form yii\widgets\ActiveForm */
$model->service_id = $service_id['id'];

?>

<div class="work-results-form">
   <?php $form = ActiveForm::begin(['action' => '/admin/work-results/create']); ?>
    <div class="col-lg-6">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
           <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'required' => true]) ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
           <?= $form->field($model, 'deadline')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
           <?= $form->field($model, 'price')->textInput(['required' => true]) ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
           <?= $form->field($model, 'tooked_metall')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
           <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
           <?= $form->field($model, 'status')->dropDownList(['1' => 'Включен', '0' => 'Отключен']) ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
           <?= $form->field($model, 'img')->fileInput(['required' => true]) ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
           <?= $form->field($model, 'img_draw')->fileInput(['required' => true]) ?>
        </div>
    </div>
    <div class="col-lg-12 text-center">
       <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink']) ?>
    </div>
   <?= $form->field($model, 'service_id')->hiddenInput(['value' => $service_id['id']])->label(false) ?>
   <?php ActiveForm::end(); ?>
</div>
