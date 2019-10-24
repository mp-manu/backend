<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 23.10.2019
 * Time: 0:22
 */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="equipment-form">

   <?php if (!empty($equipmentData) && isset($equipmentData)): ?>
      <div class="col-lg-12">
         <p>
            <?= Html::button('Добавить', ['class' => 'btn btn-success', 'id' => 'equipment-form']) ?>
         </p>
      </div>
      <div class="col-lg-12" id="frm-content-equipment">
         <div class="table-responsive">
            <table class="table table-striped custom-table table-hover">
               <thead>
               <tr>
                  <th>№</th>
                  <th>Название</th>
                  <th>Описание</th>
                  <th>Фото</th>
                  <th>Действие</th>
               </tr>
               </thead>
               <tbody>
               <?php $i = 0;
               foreach ($equipmentData as $equipment): $i++ ?>
                  <tr>
                     <td><?= $i ?></td>
                     <td><?= $equipment['name'] ?></td>
                     <td><?= $equipment['description'] ?></td>
                     <td>
                         <?php if(!empty($equipment['img'])): ?>
                         <img src="<?= Yii::getAlias('@uploads').'/'.$equipment['img'] ?>" width="80">
                         <?php endif; ?>
                     </td>
                     <td>
                        <?php if ($equipment['status'] == 1): ?>
                           <a class="btn btn-success btn-xs" data-id="<?= $equipment['id'] ?>"
                              data-text="<?= $equipment['status'] ?>" title="Статус"
                              onclick="changeStatusEquipment(this)">
                              <i class="fa fa-check" id="eqstatus<?= $equipment['id'] ?>"></i>
                           </a>
                        <?php else: ?>
                           <a class="btn btn-danger btn-xs" data-id="<?= $equipment['id'] ?>"
                              data-text="<?= $equipment['status'] ?>" title="Статус"
                              onclick="changeStatusEquipment(this)">
                              <i class="fa fa-times" id="eqstatus<?= $equipment['id'] ?>"></i>
                           </a>
                        <?php endif; ?>
                        <a class="btn btn-danger btn-xs"
                           href="/admin/equipment/delete?id=<?= $equipment['id'] ?>"
                           data-confirm="Вы уверены что хотите удалить этот оборудование?">
                           <i class="fa fa-trash-o" title="Удалить"></i>
                        </a>
                        <a class="btn btn-primary btn-xs"
                           href="/admin/equipment/update?id=<?= $equipment['id'] ?>">
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
       <?php $form = ActiveForm::begin(['action' => '/admin/equipment/create']); ?>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12 p-t-3">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 p-t-3">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="col-lg-6 p-t-3">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?= $form->field($model, 'deadline')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 p-t-3">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?= $form->field($model, 'productivity')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="col-lg-6 p-t-3">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                   <?= $form->field($model, 'img')->fileInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-12 p-t-5 text-center">
           <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink']) ?>
        </div>
    </div>
      <?= $form->field($model, 'service_id')
          ->hiddenInput(['value' => $_GET['id']])->label(false) ?>
      <?php ActiveForm::end(); ?>
   <?php endif; ?>
</div>