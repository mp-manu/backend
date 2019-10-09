<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Slider */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="slider-view">

    <h3><?= Html::encode($this->title) ?></h3>
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
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description',
            'img_url:url',
            'is_has_btn',
            'btn_title',
            'btn_link',
            'order',
            'access',
        ],
    ]) ?>

</div>
