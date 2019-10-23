<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Equipment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipment-form">
   <?php if($model->isNewRecord): ?>
   <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6 p-t-3">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?= $form->field($model, 'service_id')
                       ->dropDownList(ArrayHelper::map($services, 'id', 'name'), [
                           'prompt' => 'Выбрать услугу'
                       ]) ?>
                </div>
            </div>
            <div class="col-lg-6 p-t-3">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 p-t-3">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="col-lg-6 p-t-3">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?= $form->field($model, 'deadline')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 p-t-3">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?= $form->field($model, 'productivity')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="col-lg-6 p-t-3">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?= $form->field($model, 'img')->fileInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-12 p-t-5 text-center">
           <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink']) ?>
        </div>
    </div>
   <?php ActiveForm::end(); ?>
    <?php else: ?>

      <?php $form = ActiveForm::begin(); ?>
       <div class="col-lg-12">
           <div class="row">
               <div class="col-lg-6 p-t-3">
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                      <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                   </div>
               </div>
               <div class="col-lg-6 p-t-3">
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                      <?= $form->field($model, 'deadline')->textInput(['maxlength' => true]) ?>
                   </div>
               </div>
           </div>
           <div class="row">
               <div class="col-lg-6 p-t-3">
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                      <?= $form->field($model, 'productivity')->textInput(['maxlength' => true]) ?>
                   </div>
               </div>
               <div class="col-lg-6 p-t-3">
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                      <?= $form->field($model, 'status')->dropDownList(['1' => 'Включён', '0' => 'Выключен']) ?>
                   </div>
               </div>
           </div>
           <div class="row">
               <div class="col-lg-6 p-t-3">
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                      <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
                   </div>
               </div>
               <div class="col-lg-6 p-t-3">
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                      <?= $form->field($model, 'img')->fileInput(['maxlength' => true]) ?>
                   </div>
               </div>
           </div>
           <div class="col-lg-12 p-t-5 text-center">
              <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink']) ?>
           </div>
       </div>
      <?= $form->field($model, 'service_id')
          ->hiddenInput(['value' => $model->service_id])->label(false) ?>
      <?php ActiveForm::end(); ?>


    <?php endif; ?>
</div>
