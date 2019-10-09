<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\FrontMenu */

$this->title = 'Update Front Menu: ' . $model->nodeid;
$this->params['breadcrumbs'][] = ['label' => 'Front Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nodeid, 'url' => ['view', 'id' => $model->nodeid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="front-menu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
