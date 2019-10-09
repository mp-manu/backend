<?php

use app\modules\admin\models\FrontMenu;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\FrontMenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Меню сайта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="front-menu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="card-box">
        <div class="card-head">
            <header><?= $this->title ?></header>
        </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nodeid',
            [
                    'attribute' => 'parentnodeid',
                    'filter' => \yii\helpers\ArrayHelper::map(FrontMenu::getItems(), 'nodeid', 'nodename'),
                    'value' => function($data){
                        $name = FrontMenu::getItemById($data->parentnodeid);
                        $name = (!empty($name)) ? $name : '-';
                        return $name;
                    }
            ],
//            'nodeshortname',
            'nodename',
            [
             'attribute' => 'nodeurl:url',
                'format' => 'raw',
                'value'=>function ($data) {
                    return Html::a($data->nodeurl, $data->nodeurl, ['target' => '_blank']);
                },
            ],

            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'nodeaccess',
                'format' => 'html',
                'editableOptions' => [
                    'formOptions' => ['action' => ['/admin/editable/front-menu-access']],
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
            //'userstatus',
            //'nodestatus',
            //'nodeorder',
            //'nodefile',
            //'nodeicon',
            //'ishasdivider',
            //'hasnotify',
            //'notifyscript',
            //'isforguest',
            //'arrow_tag',
            //'position',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
</div>
