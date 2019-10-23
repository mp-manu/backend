<?php
/**
 * Created by PhpStorm.
 * User: IT_User-144
 * Date: 23.10.2019
 * Time: 11:43
 */
$this->title = 'Изменить элемент';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('/layouts/page-bar') ?>
<div class="element-edit">

   <?= $this->render('_form', [
       'model' => $model,
   ]) ?>

</div>