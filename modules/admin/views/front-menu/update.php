<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\FrontMenu */

$this->title = 'Обновить: ' . $model->nodeid;
$this->params['breadcrumbs'][] = ['label' => 'Меню сайта', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nodeid, 'url' => ['view', 'id' => $model->nodeid]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<?= $this->render('/layouts/page-bar') ?>
<div class="front-menu-update">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
