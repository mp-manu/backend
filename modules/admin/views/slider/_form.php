<?php

use app\modules\admin\models\Slider;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Slider */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="slider-form" style="margin-top: 3%">
   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="card-box">
        <div class="card-head">
            <header><?= $this->title ?></header>
        </div>
       <?php if (!$model->isNewRecord): ?>
          <?php if(!empty($model->img_url)): ?>
               <div class="col-md-12 text-center">
                   <img src="<?= Yii::getAlias('@uploads') . '/slider/' . $model->img_url ?>" width="500" height="300">
               </div>
          <?php endif; ?>
       <?php endif; ?>
        <div class="card-body row">
            <div class="col-lg-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?= $form->field($model, 'title')->textarea(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                   <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                   <?php
                   echo $form->field($model, 'order')->widget(Select2::classname(), [
                       'data' => ArrayHelper::map($sliders, 'id', function ($slider) {
                              return 'После ' . $slider['order'] . ' - ' . $slider['title'];
                           }) + ['0' => 'Первый слайд', '-1' => 'Последний слайд'],
                       'options' => ['placeholder' => 'Сортировка'],
                       'pluginOptions' => [
                           'allowClear' => true
                       ],
                   ]);
                   ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                   <?= $form->field($model, 'access')->dropDownList(['1' => 'Включен', '0' => 'Отключен']) ?>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                   <?= $form->field($model, 'is_has_btn')->dropDownList(['1' => 'Включен', '0' => 'Отключен']) ?>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                   <?= $form->field($model, 'btn_title')->textInput() ?>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                   <?= $form->field($model, 'btn_link')->textInput() ?>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                   <?= $form->field($model, 'img_url')->fileInput() ?>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                   <?= $form->field($model, 'slide_cover')->fileInput() ?>
                </div>
            </div>


            <div class="col-lg-12 text-center">
               <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink']) ?>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

