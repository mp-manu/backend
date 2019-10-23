<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Слайдер';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/layouts/page-bar') ?>
<div class="slider-index">
    <p>
        <?= Html::a('Добавить новый слайд', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $columns = [
        ['class' => 'yii\grid\SerialColumn', 'header' => '№'],
        'title',
        [
            'attribute' => 'description',
            'format' => 'html',
            'value' => function ($dataProvider) {
               return wordwrap($dataProvider->description, 40, '<br>');
            }
        ],
        [
            'attribute' => 'img_url',
            'format' => 'html',
            'value' => function($dataProvider){
                return '<a href="'.Yii::getAlias('@uploads').'/slider/'.$dataProvider->img_url.'"><img src="'.Yii::getAlias('@uploads').'/slider/'.$dataProvider->img_url.'" width="200"></a>';
            }
        ],

        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'access',
            'format' => 'html',
            'editableOptions' => [
                'formOptions' => ['action' => ['/admin/editable/chenge-slide-access']],
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
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'order',
            'format' => 'html',
            'editableOptions' => [
                'formOptions' => ['action' => ['/admin/editable/chenge-order']],
                'inputType' => Editable::INPUT_DROPDOWN_LIST,
                'data' => ArrayHelper::map($slideOrders, 'order', 'order'),
                'options' => ['class' => 'form-control', 'prompt' => "Выберите порядок"],
            ],
            'hAlign' => 'center',
            'vAlign' => 'middle',
            'filter' => false,
            'pageSummary' => true
        ],
        ['class' => 'yii\grid\ActionColumn'],
    ]
    ?>

    <div class="card-box">
        <div class="card-head">
            <header><?= $this->title ?></header>
        </div>
        <div class="card-body row">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => $columns,

            ]); ?>
        </div>
    </div>
