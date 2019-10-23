<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Equipment */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Оборудование', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="equipment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
       <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
           'class' => 'btn btn-danger',
           'data' => [
               'confirm' => 'Вы уверены что хотите удалить этот запись?',
               'method' => 'post',
           ],
       ]) ?>
    </p>
    <div class="card-box">
        <div class="card-head">
            <header><?= $this->title ?></header>
        </div>
        <div class="card-body row">

           <?= DetailView::widget([
               'model' => $model,
               'attributes' => [
                   //'id',
                   'service_id',
                   'name',
                   'description',
                   'deadline',
                   'productivity',
                   'img',
               ],
           ]) ?>
        </div>
    </div>
</div>
