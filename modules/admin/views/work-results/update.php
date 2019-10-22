<?php

use app\modules\admin\models\Services;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\WorkResults */

$this->title = 'Обновить: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Services::getServiceName($model->service_id), 'url' => ['/admin/services/edit', 'id' => $model->service_id]];
$this->params['breadcrumbs'][] = ['label' => 'Редактирование услуги', 'url' => ['/admin/services/edit', 'id' => $model->service_id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<?= $this->render('/layouts/page-bar') ?>
<div class="work-results-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
