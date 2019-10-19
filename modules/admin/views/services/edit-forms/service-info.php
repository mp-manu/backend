<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$model->service_id = $service_id['id'];
?>

<div class="service-info-form">

   <?php if (!empty($serviceInfoData) && count($serviceInfoData) > 0): ?>
       <div class="col-lg-12">
           <p>
              <?= Html::button('Добавить', ['class' => 'btn btn-success', 'id' => 'info-form']) ?>
           </p>
       </div>
       <div class="row">
           <div class="col-lg-12" id="frm-content-info">
               <div class="table-responsive">
                   <table class="table table-striped custom-table table-hover">
                       <thead>
                       <tr>
                           <th>№</th>
                           <th>Заголовок</th>
                           <th>Описание</th>
                           <th>Действие</th>
                       </tr>
                       </thead>
                       <tbody>
                       <?php $i = 0;
                       foreach ($serviceInfoData as $info): $i++ ?>
                           <tr>
                               <td><?= $i ?></td>
                               <td><?= $info['val'] ?></td>
                               <td><?= $info['description'] ?></td>
                               <td>
                                  <?php if ($info['status'] == 1): ?>
                                      <a class="btn btn-success btn-xs" data-id="<?= $info['id'] ?>"
                                         data-text="<?= $info['status'] ?>" title="Статус"
                                         onclick="changeStatusInfo(this)">
                                          <i class="fa fa-check" id="istatus<?= $info['id'] ?>"></i>
                                      </a>
                                  <?php else: ?>
                                      <a class="btn btn-danger btn-xs" data-id="<?= $info['id'] ?>"
                                         data-text="<?= $info['status'] ?>" title="Статус"
                                         onclick="changeStatusInfo(this)">
                                          <i class="fa fa-times" id="istatus<?= $info['id'] ?>"></i>
                                      </a>
                                  <?php endif; ?>
                                   <a class="btn btn-danger btn-xs"
                                      href="/admin/service-info/delete?id=<?= $info['id'] ?>"
                                      data-confirm="Вы уверены что хотите удалить эту информацию?">
                                       <i class="fa fa-trash-o" title="Удалить"></i>
                                   </a>
                                   <a class="btn btn-primary btn-xs"
                                      href="/admin/service-info/update?id=<?= $info['id'] ?>">
                                       <i class="fa fa-pencil" title="Изменить"></i>
                                   </a>
                               </td>
                           </tr>
                       <?php endforeach; ?>
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   <?php else: ?>
       <h4 style="margin-left: 20px">Добавьте преимущества способа, оборудование...</h4>
      <?php $form = ActiveForm::begin(); ?>
       <div class="row">
           <div class="col-lg-6">
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                  <?= $form->field($model, 'val')->textInput(['maxlength' => true]) ?>
               </div>
           </div>
           <div class="col-lg-6">
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                  <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>
               </div>
           </div>
       </div>
       <div class="row">
           <div class="col-lg-12">
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                  <?= $form->field($model, 'status')->dropDownList(['1' => 'Включен', '0' => 'Отключен']) ?>

               </div>
           </div>
       </div>
       <div class="row">
           <div class="col-lg-12">
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                  <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
               </div>
           </div>
       </div>
       <div class="col-lg-12   text-center">
          <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink']) ?>
       </div>
      <?php ActiveForm::end(); ?>
   <?php endif; ?>
</div>
