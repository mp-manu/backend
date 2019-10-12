<?php

use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii2mod\editable\EditableColumn;
use app\modules\admin\models\enumerables\ImageStatus;
use app\modules\admin\models\enumerables\ImageType;
use app\modules\admin\models\ImageModel;

/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $searchModel \yii2mod\settings\models\search\SettingSearch */

$this->title = Yii::t('yii2mod.settings', 'Settings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-index">
    <h1><?php echo Html::encode($this->title); ?></h1>

    <p><?php echo Html::a(Yii::t('yii2mod.settings', 'Create Setting'), ['create'], ['class' => 'btn btn-success']); ?></p>
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
                    'filter' => ImageType::listData(),
                    'filterInputOptions' => ['prompt' => Yii::t('yii2mod.settings', 'Select Type'), 'class' => 'form-control'],
                ],
                [
                    'attribute' => 'section',
                    'filter' => ArrayHelper::map(ImageModel::find()->select('section')->distinct()->all(), 'section', 'section'),
                    'filterInputOptions' => ['prompt' => Yii::t('yii2mod.settings', 'Select Section'), 'class' => 'form-control'],
                ],
                'key',
                'value:ntext',
                [
                    'class' => EditableColumn::className(),
                    'attribute' => 'status',
                    'url' => ['edit-setting'],
                    'value' => function ($model) {
                        return ImageStatus::getLabel($model->status);
                    },
                    'type' => 'select',
                    'editableOptions' => function ($model) {
                        return [
                            'source' => ImageStatus::listData(),
                            'value' => $model->status,
                        ];
                    },
                    'filter' => ImageStatus::listData(),
                    'filterInputOptions' => ['prompt' => Yii::t('yii2mod.settings', 'Select Status'), 'class' => 'form-control'],
                ],
                'description:ntext',
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
