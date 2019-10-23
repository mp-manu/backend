<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Slider */

$this->title = 'Подробная информация';
$this->params['breadcrumbs'][] = ['label' => 'Слайды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?= $this->render('/layouts/page-bar') ?>
<div class="slider-view">

<!--    <h3>--><?//= Html::encode($this->title) ?><!--</h3>-->
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
        <?= Html::a('Список слайдов', ['index'], ['class' => 'btn btn-info']) ?>
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
        <div class="card-body row">
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
    </div>
</div>
