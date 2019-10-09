<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ServiceInfo */

$this->title = 'Добавить информацию';
$this->params['breadcrumbs'][] = ['label' => 'Service Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-info-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php if (\Yii::$app->session->hasFlash('creatingError')) : ?>
        <div class="alert alert-danger alert-dismissible" style="margin-top: 5%;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <?php echo \Yii::$app->session->getFlash('creatingError'); ?>
        </div>
    <?php endif; ?>

    <?= $this->render('_form', [
        'model' => $model,
        'services' => $services,
    ]) ?>

</div>
