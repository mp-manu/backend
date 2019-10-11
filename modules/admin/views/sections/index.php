<?php

use app\modules\admin\models\Pages;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SectionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Раздел страниц';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sections-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить новый раздел', ['create'], ['class' => 'btn btn-success']) ?>
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

            [
                'attribute' => 'page_id',
                'filter' => ArrayHelper::map(Pages::getPages(), 'id', 'name'),
                'value' => function($data){
                    return $data->page;
                }
            ],
            'title',
            'alias',
            [
                'attribute' => 'description',
                'format' => 'html',
                'value' => function ($data) {
                    return wordwrap($data->description, 40, '<br>');
                }
            ],
            'type',
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'status',
                'format' => 'html',
                'editableOptions' => [
                    'formOptions' => ['action' => ['/admin/editable/section-status']],
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
