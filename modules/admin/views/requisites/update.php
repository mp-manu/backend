<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Requisites */

$this->title = 'Обновить реквизит: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Реквизиты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<?= $this->render('/layouts/page-bar') ?>
<div class="requisites-update">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
