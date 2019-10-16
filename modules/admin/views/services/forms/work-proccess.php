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
   <?php if (!empty($workProccessData) && count($workProccessData) > 1): ?>
       <div class="col-lg-12">
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
                           <td><img src="<?= Yii::getAlias('@uploads').'/proccess/'.$proccess['img'] ?>" width="150" height="100"></td>
                           <td>
                              <?php if ($proccess['status'] == 1): ?>
                                  <a class="btn btn-success btn-xs" data-id="<?= $proccess['id'] ?>"
                                     data-text="<?= $proccess['status'] ?>" title="Статус" onclick="changeStatusProccess(this)">
                                      <i class="fa fa-check" id="pstatus<?= $proccess['id'] ?>"></i>
                                  </a>
                              <?php else: ?>
                                  <a class="btn btn-danger btn-xs" data-id="<?= $proccess['id'] ?>"
                                     data-text="<?= $proccess['status'] ?>" title="Статус" onclick="changeStatusProccess(this)">
                                      <i class="fa fa-times" id="pstatus<?= $proccess['id'] ?>"></i>
                                  </a>
                              <?php endif; ?>
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
   <?php else: ?>
       <div class="col-sm-12">
           <!--        <h3 style="text-align: center">Добавить процесс работы</h3>-->
          <?php $form = ActiveForm::begin(); ?>
           <div class="col-lg-6">
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                  <?= $form->field($model, 'service_id')
                      ->dropDownList(ArrayHelper::map($services, 'id', 'name'), [
                          'prompt' => 'Выбрать услугу'
                      ]) ?>
               </div>
           </div>
           <div class="col-lg-6">
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                  <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
               </div>
           </div>

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
           <div class="col-lg-12">
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                  <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
               </div>
           </div>
           <div class="col-lg-12 text-center">
              <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink']) ?>
           </div>
          <?php ActiveForm::end(); ?>
       </div>
   <?php endif; ?>
</div>
