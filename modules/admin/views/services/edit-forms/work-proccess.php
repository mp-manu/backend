<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\WorkProccess */
/* @var $form yii\widgets\ActiveForm */

$model->service_id = $service_id['id'];
?>

<div class="work-proccess-form">
   <?php if (!empty($workProccessData) && count($workProccessData) > 0): ?>
       <div class="col-lg-12">
           <p>
              <?= Html::button('Добавить', ['class' => 'btn btn-success', 'id' => 'proccess-form']) ?>
           </p>
       </div>
       <div class="row">
           <div class="col-lg-12" id="frm-content-proccess">
               <div class="table-responsive">
                   <table class="table table-striped custom-table table-hover">
                       <thead>
                       <tr>
                           <th>№</th>
                           <th>Заголовок</th>
                           <th>Описание</th>
                           <th>Фото</th>
                           <th>Действие</th>
                       </tr>
                       </thead>
                       <tbody>
                       <?php $i = 0;
                       foreach ($workProccessData as $proccess): $i++ ?>
                           <tr>
                               <td><?= $i ?></td>
                               <td><?= $proccess['title'] ?></td>
                               <td><?= $proccess['description'] ?></td>
                               <td>
                                   <img src="<?= Yii::getAlias('@uploads') . '/proccess/' . $proccess['img'] ?>"
                                        width="150" height="100"></td>
                               <td>
                                  <?php if ($proccess['status'] == 1): ?>
                                      <a class="btn btn-success btn-xs"
                                         data-id="<?= $proccess['id'] ?>"
                                         data-text="<?= $proccess['status'] ?>" title="Статус"
                                         onclick="changeStatusProccess(this)">
                                          <i class="fa fa-check"
                                             id="pstatus<?= $proccess['id'] ?>"></i>
                                      </a>
                                  <?php else: ?>
                                      <a class="btn btn-danger btn-xs"
                                         data-id="<?= $proccess['id'] ?>"
                                         data-text="<?= $proccess['status'] ?>" title="Статус"
                                         onclick="changeStatusProccess(this)">
                                          <i class="fa fa-times"
                                             id="pstatus<?= $proccess['id'] ?>"></i>
                                      </a>
                                  <?php endif; ?>
                                   <a class="btn btn-danger btn-xs"
                                      href="/admin/work-proccess/delete?id=<?= $proccess['id'] ?>"
                                      data-confirm="Вы уверены что хотите удалить этот процесс работы?">
                                       <i class="fa fa-trash-o" title="Удалить"></i>
                                   </a>
                                   <a class="btn btn-primary btn-xs"
                                      href="/admin/work-proccess/update?id=<?= $proccess['id'] ?>">
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
      <?php $form = ActiveForm::begin(); ?>

       <!--        <h3 style="text-align: center">Добавить процесс работы</h3>-->
       <div class="row">
           <div class="col-lg-12">
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                  <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
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
       <div class="row">
           <div class="col-lg-6">
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                  <?= $form->field($model, 'status')->dropDownList(['1' => 'Включен', '0' => 'Отключен']) ?>
               </div>
           </div>
           <div class="col-lg-6">
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                  <?= $form->field($model, 'img')->fileInput(['maxlength' => true]) ?>
               </div>
           </div>
       </div>
       <div class="col-lg-12 text-center">
          <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink']) ?>
       </div>
      <?php ActiveForm::end(); ?>

   <?php endif; ?>
</div>
