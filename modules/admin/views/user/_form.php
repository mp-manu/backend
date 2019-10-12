<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

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
                                <?= $form->field($model, 'username')
                                    ->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-3">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <?= $form->field($model, 'user_password')
                                    ->passwordInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 p-t-3">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <?= $form->field($model, 'user_type')
                                    ->dropDownList(['A' => 'Администратор', 'E' => 'Сотрудник', 'U' => 'Обычный пользователь']) ?>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-3">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <?= $form->field($model, 'is_block')
                                    ->dropDownList(['0' => 'Включён', '1' => 'Отключен']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 p-t-3">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <?= $form->field($model, 'email')->textInput()->label() ?>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-3">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <?= $form->field($model, 'avatar')->fileInput()->label('Фото') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
