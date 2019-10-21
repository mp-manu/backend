<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\WorkResults */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="work-results-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="card-head">
                    <header><?= $this->title ?></header>
                </div>
                <div class="card-body">
                   <?php if (!empty($model->img)): ?>
                       <div class="col-md-12 text-center">
                           <img src="<?= Yii::getAlias('@uploads') . '/results/' . $model->img ?>" width="250">
                       </div>
                   <?php endif; ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <?= $form->field($model, 'deadline')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <?= $form->field($model, 'price')->textInput() ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <?= $form->field($model, 'tooked_metall')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <?= $form->field($model, 'status')->dropDownList(['1' => 'Включен', '0' => 'Отключен']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <?= $form->field($model, 'img')->fileInput() ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <?= $form->field($model, 'img_draw')->fileInput() ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php ActiveForm::end(); ?>

</div>
