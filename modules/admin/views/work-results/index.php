<?php

use kartik\editable\Editable;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\WorkResultsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Примеры работ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-results-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить новый результат', ['create'], ['class' => 'btn btn-success']) ?>
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
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    [
                        'attribute' => 'description',
                        'format' => 'html',
                        'value' => function ($data) {
                            return wordwrap($data->description, 100, '<br>');
                        }
                    ],
                    'deadline',
                    'price',
                    //'tooked_metall',
                    'img',
                    [
                        'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'status',
                        'format' => 'html',
                        'editableOptions' => [
                            'formOptions' => ['action' => ['/admin/editable/work-result-status']],
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
