<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Services */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="services-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php if (\Yii::$app->session->hasFlash('creatingSuccess')) : ?>
                <div class="alert alert-success alert-dismissible" style="margin-top: 5%;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <?php echo \Yii::$app->session->getFlash('creatingSuccess'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
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
            'id',
            'parent_id',
            'name',
            'alias',
            'description:ntext',
            'img',
            'status',
        ],
    ]) ?>
    </div>
</div>