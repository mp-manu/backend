<?php

use app\modules\admin\models\Services;
use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\WorkProccessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Проссец работы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-proccess-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <p>
        <?= Html::a('Добавить новый процесс', ['create'], ['class' => 'btn btn-success']) ?>
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
                    'id',
                    [
                        'attribute' => 'service_id',
                        'filter' => ArrayHelper::map(Services::getServices(), 'id', 'name'),
                        'value' => function($data){
                            return $data->name;
                        }
                    ],
                    'title',
                    'description',
                    'img',
                    [
                        'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'status',
                        'format' => 'html',
                        'editableOptions' => [
                            'formOptions' => ['action' => ['/admin/editable/work-proccess-status']],
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
