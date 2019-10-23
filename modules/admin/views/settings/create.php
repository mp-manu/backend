<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $model \yii2mod\settings\models\SettingModel */

$this->title = Yii::t('yii2mod.settings', 'Create Setting');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii2mod.settings', 'Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('/layouts/page-bar') ?>
<div class="setting-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]);
    ?>

</div>
