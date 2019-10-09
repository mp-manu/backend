<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\AnswerQuestions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="answer-questions-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="card-head">
                    <header><?= $this->title ?></header>
                </div>
                <div class="card-body row">
                    <div class="col-lg-6 p-t-5">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <?= $form->field($model, 'question')->textarea(['rows' => 4]) ?>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-5">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <?= $form->field($model, 'answer')->textarea(['maxlength' => true, 'rows' => 4]) ?>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-5">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <?= $form->field($model, 'service_id')
                                ->dropDownList(ArrayHelper::map($services, 'id', 'name'), [
                                    'prompt' => 'Выбрать категорию'
                                ]) ?>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-5">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>

                    <div class="col-lg-6 p-t-5">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-5">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <?= $form->field($model, 'type')->dropDownList(['1' => 'Общий', '0'=>'Пользовательский'], ['prompt' => 'Выбрать тип вопроса']) ?>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-5">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <?= $form->field($model, 'status')->dropDownList(['1' => 'Включен', '0'=>'Отключен'], ['prompt' => 'Доступ']) ?>
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
