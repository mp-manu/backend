<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\FrontMenu */

$this->title = 'Create Front Menu';
$this->params['breadcrumbs'][] = ['label' => 'Front Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="front-menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
