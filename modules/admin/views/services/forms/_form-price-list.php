<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PriceList */
/* @var $form yii\widgets\ActiveForm */
$model->service_id = $service_id['id'];

?>

<div class="price-list-form">
    <div class="col-lg-12">
       <?php $form = ActiveForm::begin(['action' => '/admin/price-list/create']); ?>
        <div class="col-lg-6 p-t-3">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'service_id')
                   ->dropDownList(ArrayHelper::map($services, 'id', 'name'), [
                       'prompt' => 'Выбрать услугу',
                       'required' => true,
                   ]) ?>
            </div>
        </div>
        <div class="col-lg-6 p-t-3">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'signature')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="col-lg-6 p-t-3">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'depth')->textInput() ?>
            </div>
        </div>
        <div class="col-lg-6 p-t-3">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'length')->textInput() ?>
            </div>
        </div>
        <div class="col-lg-6 p-t-3">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'deadline')->textInput() ?>
            </div>
        </div>
        <div class="col-lg-6 p-t-3">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'price')->textInput() ?>
            </div>
        </div>

        <div class="col-lg-6 p-t-3">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'status')->dropDownList(['1' => 'Включен', '0' => 'Отключен']) ?>
            </div>
        </div>
        <div class="col-lg-6 p-t-3">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'type')->dropDownList(['2' => 'Таблица', '1' => 'Список']) ?>
            </div>
        </div>
        <div class="col-lg-12 p-t-3">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
               <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="col-lg-12 p-t-5 text-center">
           <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink']) ?>
        </div>
       <?php ActiveForm::end(); ?>
    </div>
</div>