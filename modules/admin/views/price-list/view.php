<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PriceList */

$this->title = $model->description;
$this->params['breadcrumbs'][] = ['label' => 'Price Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="price-list-view">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php if (\Yii::$app->session->hasFlash('creatingSuccess')) : ?>
        <div class="alert alert-success alert-dismissible" style="margin-top: 5%;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <?php echo \Yii::$app->session->getFlash('creatingSuccess'); ?>
        </div>
    <?php endif; ?>
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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'service_id',
            'signature',
            'depth',
            'length',
            'deadline',
            'description',
            'price',
            'type',
            'status',
        ],
    ]) ?>

</div>
