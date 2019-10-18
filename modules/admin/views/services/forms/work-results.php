<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\WorkResults */
/* @var $form yii\widgets\ActiveForm */
$model->service_id = $service_id['id'];

?>

<div class="work-results-form">
   <?php if (!empty($workResultsData) && count($workResultsData) > 0): ?>
       <div class="col-lg-12">
           <p>
              <?= Html::button('Добавить', ['class' => 'btn btn-success', 'id' => 'result-form']) ?>
           </p>
       </div>
       <div class="col-lg-12">
           <div class="table-responsive" id="frm-content-result">
               <table class="table table-striped custom-table table-hover">
                   <thead>
                   <tr>
                       <th>№</th>
                       <th>Название</th>
                       <th>Описание</th>
                       <th>Срок выполнение</th>
                       <th>Цена</th>
                       <th>Потрачено метала</th>
                       <th>Фото</th>
                       <th>Действие</th>
                   </tr>
                   </thead>
                   <tbody>
                   <?php $i = 0;
                   foreach ($workResultsData as $result): $i++ ?>
                       <tr>
                           <td><?= $i ?></td>
                           <td><?= $result['name'] ?></td>
                           <td><?= $result['description'] ?></td>
                           <td><?= $result['deadline'] ?></td>
                           <td><?= $result['price'] ?></td>
                           <td><?= $result['tooked_metall'] ?></td>
                           <td><img src="<?= Yii::getAlias('@uploads') . '/results/' . $result['img'] ?>" width="130"
                                    height="100"></td>
                           <td>
                              <?php if ($result['status'] == 1): ?>
                                  <a class="btn btn-success btn-xs" data-id="<?= $result['id'] ?>"
                                     data-text="<?= $result['status'] ?>" title="Статус"
                                     onclick="changeResultStatus(this)">
                                      <i class="fa fa-check" id="rstatus<?= $result['id'] ?>"></i>
                                  </a>
                              <?php else: ?>
                                  <a class="btn btn-danger btn-xs" data-id="<?= $result['id'] ?>"
                                     data-text="<?= $result['status'] ?>" title="Статус"
                                     onclick="changeResultStatus(this)">
                                      <i class="fa fa-times" id="rstatus<?= $result['id'] ?>"></i>
                                  </a>
                              <?php endif; ?>
                               <a class="btn btn-danger btn-xs"
                                  href="/admin/work-results/delete?id=<?= $result['id'] ?>" data-confirm="Вы уверены что хотите удалить этот результат работы?">
                                   <i class="fa fa-trash-o" title="Удалить"></i>
                               </a>
                               <a class="btn btn-primary btn-xs"
                                  href="/admin/work-results/update?id=<?= $result['id'] ?>">
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
           <!--        <h3 style="text-align: center">Добавить результаты работ</h3>-->
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
                  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
               </div>
           </div>
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
           <div class="col-lg-6">
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                  <?= $form->field($model, 'tooked_metall')->textInput(['maxlength' => true]) ?>
               </div>
           </div>
           <div class="col-lg-6">
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                  <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
               </div>
           </div>
           <div class="col-lg-6">
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                  <?= $form->field($model, 'status')->dropDownList(['1' => 'Включен', '0' => 'Отключен']) ?>
               </div>
           </div>
           <div class="col-lg-6">
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                  <?= $form->field($model, 'img')->fileInput() ?>
               </div>
           </div>
           <div class="col-lg-12 text-center">
              <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink']) ?>
           </div>
          <?php ActiveForm::end(); ?>
       </div>

   <?php endif; ?>
</div>
