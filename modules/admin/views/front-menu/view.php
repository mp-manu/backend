<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\FrontMenu */

$this->title = $model->nodeid;
$this->params['breadcrumbs'][] = ['label' => 'Меню сайта', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?= $this->render('/layouts/page-bar') ?>
<div class="front-menu-view">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->nodeid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->nodeid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="card-box">
        <div class="card-head">
            <header><?= $this->title ?></header>
        </div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nodeid',
            'parentnodeid',
            'nodeshortname',
            'nodename',
            'nodeurl',
            'userstatus',
            'nodeaccess',
            'nodestatus',
            'nodeorder',
            'nodefile',
            'nodeicon',
            'ishasdivider',
            'hasnotify',
            'notifyscript',
            'isforguest',
            'arrow_tag',
            'position',
        ],
    ]) ?>
    </div>
</div>
