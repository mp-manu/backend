<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\enumerables\ImageStatus;
use app\modules\admin\models\enumerables\ImageType;

/* @var $this \yii\web\View */
/* @var $model \yii2mod\settings\models\SettingModel */
?>

<div class="setting-form">

   <?php $form = ActiveForm::begin(); ?>
    <div class="card-box">
        <div class="card-head">
        </div>
        <div class="card-body row">
            <?php if(!$model->isNewRecord): ?>
            <div class="col-xs-12 text-center">
                <img src="<?= Yii::getAlias('@uploads') . '/' . $model->img ?>" width="500">
            </div>
            <?php endif; ?>
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
            <div class="col-lg-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?php echo $form->field($model, 'status')->dropDownList(ImageStatus::listData()); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?php echo $form->field($model, 'description')->textarea(['rows' => 5]); ?>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?php echo $form->field($model, 'img')->fileInput(); ?>
                </div>
            </div>
            <div class="col-lg-12 text-center">
               <?php echo Html::submitButton($model->isNewRecord ? Yii::t('yii2mod.settings', 'Create') : Yii::t('yii2mod.settings', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
               <?php echo Html::a(Yii::t('yii2mod.settings', 'Go Back'), ['index'], ['class' => 'btn btn-default']); ?>
            </div>
        </div>
    </div>
   <?php ActiveForm::end(); ?>

</div>
