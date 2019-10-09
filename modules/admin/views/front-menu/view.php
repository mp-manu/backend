<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\FrontMenu */

$this->title = $model->nodeid;
$this->params['breadcrumbs'][] = ['label' => 'Front Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="front-menu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->nodeid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->nodeid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
