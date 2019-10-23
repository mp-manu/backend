<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 23.10.2019
 * Time: 0:41
 */
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="equipment-form">
   <?php $form = ActiveForm::begin(['action' => '/admin/equipment/create']); ?>
   <div class="col-lg-12">
      <div class="row">
         <div class="col-lg-6 p-t-3">
             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'required' => true]) ?>
             </div>
         </div>
         <div class="col-lg-6 p-t-3">
             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <?= $form->field($model, 'img')->fileInput(['maxlength' => true]) ?>
             </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 p-t-3">
             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <?= $form->field($model, 'deadline')->textInput(['maxlength' => true]) ?>
             </div>
         </div>
         <div class="col-lg-6 p-t-3">
             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <?= $form->field($model, 'productivity')->textInput(['maxlength' => true]) ?>
             </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 p-t-3">
             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <?= $form->field($model, 'description')->textarea(['maxlength' => true, 'required' => true]) ?>
             </div>
         </div>
         <div class="col-lg-6 p-t-3">
             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'status')->dropDownList(['1' => 'Включён', '0' => "Выключен"]) ?>
             </div>
         </div>
      </div>
      <div class="col-lg-12 p-t-5 text-center">
         <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink']) ?>
      </div>
   </div>
   <?= $form->field($model, 'service_id')->hiddenInput(['maxlength' => true,'value'=>$service_id['id']])->label(false) ?>
    <?php ActiveForm::end(); ?>
</div>
