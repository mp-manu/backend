<?php

use app\modules\admin\models\Services;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use  kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ServicesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Услуги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить услугу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="card-box">
        <div class="card-head">
            <header><?= $this->title ?></header>
        </div>
        <div class="card-body row">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    'id',
                    [
                        'attribute' => 'parent_id',
                        'filter' => ArrayHelper::map(Services::getServices(), 'id', 'name'),
                        'value' => function($data){
                            return $data->name;
                        }
                    ],
                    'name',
//                    'alias',
                    'img',

                    [
                        'attribute' => 'description',
                        'format' => 'html',
                        'value' => function ($data) {
                            return wordwrap($data->description, 60, '<br>');
                        }
                    ],

                    [
                        'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'status',
                        'format' => 'html',
                        'editableOptions' => [
                            'formOptions' => ['action' => ['/admin/editable/service-status']],
                            'inputType' => Editable::INPUT_DROPDOWN_LIST,
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
