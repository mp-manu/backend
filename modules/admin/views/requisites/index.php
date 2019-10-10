<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\RequisitesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Requisites';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requisites-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Requisites', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'legal_address',
            'mailing_address',
            'inn',
            'kpp',
            //'rs',
            //'ks',
            //'okpo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
