<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\WorkProccess */

$this->title = 'Обновить процесс работы: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Редактирование услуги', 'url' => ['/admin/services/edit', 'id' => $model->service_id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<?= $this->render('/layouts/page-bar') ?>
<div class="work-proccess-update">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
        'services' => $services,
    ]) ?>

</div>
