<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\FrontMenu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="front-menu-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
            <div class="col-xs-12 col-sm-4 col-lg-4">
                <?= $form->field($model, 'parentnodeid')->textInput() ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-4">
                <?= $form->field($model, 'nodeshortname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-4">
                <?= $form->field($model, 'nodename')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
            <div class="col-xs-12 col-sm-4 col-lg-4">
                <?= $form->field($model, 'nodeurl')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-4">
                <?= $form->field($model, 'userstatus')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-4">
                <?= $form->field($model, 'nodeaccess')->textInput() ?>
            </div>
        </div>
    </div>
    <div class="form-group" style="margin-left: 15px">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
