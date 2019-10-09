<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ServiceInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Дополнительные информации';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-info-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Service Info', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="card-box">
        <div class="card-head">

        </div>
        <div class="card-body row">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                    'attribute' => 'service.name',
            ],
            'key',
            'val',
            [
                'attribute' => 'description',
                'format' => 'html',
                'value' => function ($data) {
                    return wordwrap($data->description, 60, '<br>');
                }
            ],
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

        </div>
    </div>
</div>
