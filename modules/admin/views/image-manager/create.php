<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $model \yii2mod\settings\models\SettingModel */

$this->title = 'Настройки фото';
$this->params['breadcrumbs'][] = ['label' => 'Список фото', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('/layouts/page-bar') ?>
<div class="setting-create">

<!--    <h1>--><?php //echo Html::encode($this->title); ?><!--</h1>-->

    <?php echo $this->render('_form', [
        'model' => $model,
    ]);
    ?>

</div>
