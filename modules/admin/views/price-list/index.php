<?php

use app\modules\admin\models\Services;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PriceListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Прайс лист';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-list-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Добавить новый запись', ['create'], ['class' => 'btn btn-success']) ?>
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
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'service_id',
                'filter' => ArrayHelper::map(Services::getServices(), 'id', 'name'),
                'value' => function($data){
                    return $data->name;
                }
            ],
            'signature',
            'depth',
            'length',
            'deadline',
            //'description',
            'price',
            //'type',
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'status',
                'format' => 'html',
                'editableOptions' => [
                    'formOptions' => ['action' => ['/admin/editable/price-list']],
                    'inputType' => \kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                    'data' => [1 => 'Включить', 0 => 'Выключить'],
                    'options' => ['class' => 'form-control', 'prompt' => "Выберите статус"],
                    'displayValueConfig' => [
                        '0' => '<span class="glyphicon glyphicon-remove-sign" style="font-size:25px;color:#C9302C"></span>',
                        '1' => '<span class="glyphicon glyphicon-ok-sign" style="font-size:25px;color:#449D44"></span>',
                    ],
                ],
                'hAlign' => 'center',
                'vAlign' => 'middle',
                'filter' => array(1 => 'Активный', 0 => 'Неактивный'),
                'pageSummary' => true
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        </div>
    </div>
</div>
