<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\FrontMenuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="front-menu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nodeid') ?>

    <?= $form->field($model, 'parentnodeid') ?>

    <?= $form->field($model, 'nodeshortname') ?>

    <?= $form->field($model, 'nodename') ?>

    <?= $form->field($model, 'nodeurl') ?>

    <?php // echo $form->field($model, 'userstatus') ?>

    <?php // echo $form->field($model, 'nodeaccess') ?>

    <?php // echo $form->field($model, 'nodestatus') ?>

    <?php // echo $form->field($model, 'nodeorder') ?>

    <?php // echo $form->field($model, 'nodefile') ?>

    <?php // echo $form->field($model, 'nodeicon') ?>

    <?php // echo $form->field($model, 'ishasdivider') ?>

    <?php // echo $form->field($model, 'hasnotify') ?>

    <?php // echo $form->field($model, 'notifyscript') ?>

    <?php // echo $form->field($model, 'isforguest') ?>

    <?php // echo $form->field($model, 'arrow_tag') ?>

    <?php // echo $form->field($model, 'position') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
