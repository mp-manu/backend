<?php

use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii2mod\editable\EditableColumn;
use app\modules\admin\models\enumerables\SettingType;
use app\modules\admin\models\enumerables\SettingStatus;
use app\modules\admin\models\SettingModel;

/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $searchModel \yii2mod\settings\models\search\SettingSearch */

$this->title = 'Настройка текстов';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('/layouts/page-bar') ?>
<div class="setting-index">
<!--    <h1>--><?php //echo Html::encode($this->title); ?><!--</h1>-->
    <div class="card-box">
        <div class="card-head">
            <header><?= $this->title ?></header>
        </div>
        <div class="card-body row">
    <p><?php echo Html::a('Добавить текст', ['create'], ['class' => 'btn btn-success']); ?></p>
    <?php Pjax::begin(['timeout' => 10000, 'enablePushState' => false]); ?>
    <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'class' => 'yii\grid\SerialColumn',
                ],
                [
                    'attribute' => 'type',
                    'filter' => SettingType::listData(),
                    'filterInputOptions' => ['prompt' => Yii::t('yii2mod.settings', 'Select Type'), 'class' => 'form-control'],
                ],
                [
                    'attribute' => 'section',
                    'filter' => ArrayHelper::map(SettingModel::find()->select('section')->distinct()->all(), 'section', 'section'),
                    'filterInputOptions' => ['prompt' => Yii::t('yii2mod.settings', 'Select Section'), 'class' => 'form-control'],
                ],
                'key',
                [
                    'attribute' => 'value',
                    'format' => 'html',
                    'value' => function ($dataProvider) {
                       return wordwrap($dataProvider->value, 40, '<br>');
                    }
                ],
                [
                    'class' => EditableColumn::className(),
                    'attribute' => 'status',
                    'url' => ['edit-setting'],
                    'value' => function ($model) {
                        return SettingStatus::getLabel($model->status);
                    },
                    'type' => 'select',
                    'editableOptions' => function ($model) {
                        return [
                            'source' => SettingStatus::listData(),
                            'value' => $model->status,
                        ];
                    },
                    'filter' => SettingStatus::listData(),
                    'filterInputOptions' => ['prompt' => Yii::t('yii2mod.settings', 'Select Status'), 'class' => 'form-control'],
                ],
                [
                    'attribute' => 'description',
                    'format' => 'html',
                    'value' => function ($dataProvider) {
                       return wordwrap($dataProvider->description, 40, '<br>');
                    }
                ],
                [
                    'header' => Yii::t('yii2mod.settings', 'Actions'),
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}{delete}',
                ],
            ],
        ]
    ); ?>
    <?php Pjax::end(); ?>
</div>
    </div>
</div>
