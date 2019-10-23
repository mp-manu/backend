<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Equipment */

$this->title = 'Обновить оборудование: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Список оборудование', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="equipment-update">
   <?= $this->render('/layouts/page-bar') ?>
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
    <div class="card-box">
        <div class="card-head">
            <header><?= $this->title ?></header>
        </div>
        <div class="card-body row">
           <?= $this->render('_form', [
               'model' => $model,
               'services' => $services
           ]) ?>
        </div>
    </div>

</div>
