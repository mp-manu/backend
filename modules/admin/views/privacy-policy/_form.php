<?php

use app\modules\admin\models\PrivacyPolicy;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PrivacyPolicy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="privacy-policy-form">
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
                               <?= $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(PrivacyPolicy::getAllParents(), 'id', 'title'), [
                                       'prompt' => 'Выбрать раздел'
                               ]) ?>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-3">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                    </div>
                   <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                   <?= $form->field($model, 'status')->dropDownList(['1' => 'Активный', '0' => 'Неактивный']) ?>
                    <div class="form-group">
                       <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                    </div>

                   <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
