<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\WorkResults */

$this->title = 'Добавить результат';
$this->params['breadcrumbs'][] = ['label' => 'Результат работы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('/layouts/page-bar') ?>
<div class="work-results-create">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
