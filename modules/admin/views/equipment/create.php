<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Equipment */

$this->title = 'Добавить оборудование';
$this->params['breadcrumbs'][] = ['label' => 'Список оборудование', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('/layouts/page-bar') ?>
<div class="equipment-create">
    <!--    <h1>--><? //= Html::encode($this->title) ?><!--</h1>-->
    <div class="card-box">
        <div class="card-head">
            <header><?= $this->title ?></header>
        </div>
        <div class="card-body row">
           <?= $this->render('_form', [
               'model' => $model,
               'services' => $services,
           ]) ?>
        </div>
    </div>
</div>
