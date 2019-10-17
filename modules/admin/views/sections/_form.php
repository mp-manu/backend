<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Sections */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="sections-form">
   <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="card-head">
                    <header><?= $this->title ?></header>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <?= $form->field($model, 'page_id')
                                   ->dropDownList(ArrayHelper::map($pages, 'id', 'name'), [
                                       'prompt' => 'Выбрать категорию'
                                   ]) ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
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
                               <?= $form->field($model, 'type')->textInput() ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <?= $form->field($model, 'status')->dropDownList(['1' => 'Включён', '0' => 'Выключен']) ?>
                            </div>
                        </div>
                    </div>
                   <?php if (!$model->isNewRecord): ?>
                      <?php if(!empty($model->img)): ?>
                           <div class="row">
                           <div class="col-lg-6">
                               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                   <img src="<?= Yii::getAlias('@uploads').'/'.$model->img ?>" width="300"
                                        height="220">
                               </div>
                           </div>
                      <?php endif; ?>
                      <?php if(!empty($model->ico)): ?>
                           <div class="col-lg-6">
                               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                   <img src="<?= Yii::getAlias('@uploads').'/'.$model->ico ?>">
                               </div>
                           </div>
                           </div>
                      <?php endif; ?>
                   <?php endif; ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <?= $form->field($model, 'img')->fileInput() ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <?= $form->field($model, 'ico')->fileInput() ?>
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
