<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Requisites */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requisites-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="card-head">
                    <header><?= $this->title ?></header>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 p-t-3">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <?= $form->field($model, 'legal_address')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-3">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <?= $form->field($model, 'mailing_address')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 p-t-3">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-3">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <?= $form->field($model, 'kpp')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 p-t-3">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <?= $form->field($model, 'rs')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-3">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <?= $form->field($model, 'kpp')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 p-t-3">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <?= $form->field($model, 'okpo')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 p-t-5 text-center">
                        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
