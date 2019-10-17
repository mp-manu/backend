<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\enumerables\SettingStatus;
use app\modules\admin\models\enumerables\SettingType;

/* @var $this \yii\web\View */
/* @var $model \yii2mod\settings\models\SettingModel */
?>

<div class="setting-form">
    <div class="card-box">
        <div class="card-head">
        </div>
        <div class="card-body">
           <?php $form = ActiveForm::begin(); ?>
            <div class="row">
            <div class="col-lg-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?php echo $form->field($model, 'section')->textInput(['maxlength' => 255]); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?php echo $form->field($model, 'key')->textInput(['maxlength' => 255]); ?>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?php echo $form->field($model, 'value')->textarea(['rows' => 5]); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?php echo $form->field($model, 'description')->textarea(['rows' => 5]); ?>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?php echo $form->field($model, 'status')->dropDownList(SettingStatus::listData()); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?php echo $form->field($model, 'type')->dropDownList(SettingType::listData()); ?>
                </div>
            </div>
            </div>
            <div class="col-lg-12">
               <?php echo Html::submitButton($model->isNewRecord ? Yii::t('yii2mod.settings', 'Create') : Yii::t('yii2mod.settings', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
               <?php echo Html::a(Yii::t('yii2mod.settings', 'Go Back'), ['index'], ['class' => 'btn btn-default']); ?>
            </div>

           <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
