<?php

use kartik\editable\Editable;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;


$this->title = 'Вопросы и ответы';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('/layouts/page-bar') ?>
<div class="answer-questions-index">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <p>
        <?= Html::a('Добавить вопрос-ответ', ['create'], ['class' => 'btn btn-success']) ?>
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

                    [
                        'attribute' => 'service_id',
                        'filter' => ArrayHelper::map(\app\modules\admin\models\Services::getServices(), 'id', 'name'),
                        'value' => function($data){
                            return $data->name;
                        }
                    ],
                    [
                        'attribute' => 'question',
                        'format' => 'html',
                        'value' => function ($data) {
                            return wordwrap($data->question, 40, '<br>');
                        }
                    ],
                    [
                        'attribute' => 'answer',
                        'format' => 'html',
                        'value' => function ($data) {
                            return wordwrap($data->answer, 100, '<br>');
                        }
                    ],
                    'username',
                    'phone',
//                    'type',
                    [
                        'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'status',
                        'format' => 'html',
                        'editableOptions' => [
                            'formOptions' => ['action' => ['/admin/editable/answer-question-status']],
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
