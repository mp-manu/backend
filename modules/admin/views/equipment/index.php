<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\EquipmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Оборудование';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('/layouts/page-bar') ?>

<div class="equipment-index">
    <p>
       <?= Html::a('Добавить оборудование', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="card-box">
        <div class="card-head">
            <header><?= $this->title ?></header>
        </div>
        <div class="card-body row">
           <?= GridView::widget([
               'dataProvider' => $dataProvider,
               'filterModel' => $searchModel,
               'columns' => [
                   ['class' => 'yii\grid\SerialColumn'],

                  //'id',
                   'service_id',
                   'name',
                   'description',
                   'deadline',
                  //'productivity',
                  //'img',

                   ['class' => 'yii\grid\ActionColumn'],
               ],
           ]); ?>
        </div>
    </div>
</div>
