<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ServiceInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-info-form">
    <h3 style="text-align: center">Добавить информацию об услуге</h3>
   <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-6 p-t-5">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
           <?= $form->field($model, 'service_id')
               ->dropDownList(ArrayHelper::map($services, 'id', 'name'), [
                   'prompt' => 'Выбрать категорию'
               ]) ?>
        </div>
    </div>
    <div class="col-lg-6 p-t-5">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
           <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="col-lg-6 p-t-5">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
           <?= $form->field($model, 'val')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="col-lg-6 p-t-5">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
           <?= $form->field($model, 'status')->dropDownList(['1' => 'Включен', '0' => 'Отключен']) ?>

        </div>
    </div>
    <div class="col-lg-12 p-t-5">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
           <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="col-lg-12 p-t-5 text-center">
       <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink']) ?>
    </div>
   <?php ActiveForm::end(); ?>
</div>
