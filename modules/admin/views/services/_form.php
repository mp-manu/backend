<?php

use app\modules\admin\models\Services;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Services */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="services-form">
   <?php if (!empty($service_id['name'])): ?>
       <!--        <h3 style="text-align: center">--><? //= $service_id['name'] ?><!--</h3>-->
   <?php else: ?>
       <!--        <h3 style="text-align: center">Добавить услугу</h3>-->
   <?php endif; ?>
   <?php if (!empty($model->img)): ?>
       <div class="col-md-12 text-center">
           <img src="<?= Yii::getAlias('@uploads') . '/services/' . $model->img ?>" width="350">
       </div>
   <?php endif; ?>
   <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'parent_id')
                   ->dropDownList(ArrayHelper::map($services, 'id', 'name'), [
                       'prompt' => 'Выбрать категорию'
                   ]) ?>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'alias')->textInput() ?>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'img')->fileInput() ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'status')->dropDownList(['1' => 'Включен', '0' => 'Отключен']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>
            </div>
        </div>
    </div>

    <div class="col-lg-12 text-center">
       <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink']) ?>
    </div>
   <?php ActiveForm::end(); ?>
</div>