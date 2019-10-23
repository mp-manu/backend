<?php
/**
 * Created by PhpStorm.
 * User: IT_User-144
 * Date: 23.10.2019
 * Time: 10:52
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Элементы вебмастера';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
   <div class="col-md-12">
      <div class="card card-box">
         <div class="card-head">
            <header><?= $this->title ?></header>
            <div class="tools">
               <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
               <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
               <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
            </div>
         </div>
         <div class="card-body">
            <?php $form = ActiveForm::begin() ?>
             <div class="row">
                 <div class="col-lg-12 p-t-3">
                     <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                        <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-lg-12 p-t-3">
                     <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                        <?= $form->field($model, 'scripts')->textarea(['rows' => 6]) ?>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-lg-6 p-t-3">
                     <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                        <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>
                     </div>
                 </div>
                 <div class="col-lg-6 p-t-3">
                     <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                        <?= $form->field($model, 'status')->dropDownList(['1' => 'Включен', '0' => 'Выключен']) ?>
                     </div>
                 </div>
             </div>
             <div class="col-lg-12 p-t-5 text-center">
                <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink']) ?>
             </div>
            <?php ActiveForm::end() ?>
         </div>
      </div>
   </div>
</div>