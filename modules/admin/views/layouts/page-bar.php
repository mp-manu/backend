<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 12.10.2019
 * Time: 18:05
 */
use yii\widgets\Breadcrumbs;
?>
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title"><?= $this->title ?></div>
        </div>
       <?= Breadcrumbs::widget([
           'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
           'tag' => 'ol',
           'options' => ['class' => 'breadcrumb page-breadcrumb pull-right'],
           'itemTemplate' => '<li>{link}&nbsp;<i class="fa fa-angle-right"></i></li>',
           'homeLink' => ['label' => 'Главная', 'url' => '/admin'],
       ]) ?>
<!--        <ol class="breadcrumb page-breadcrumb pull-right">-->
<!--            <li><i class="fa fa-home"></i>&nbsp;-->
<!--                <a class="parent-item" href="index-2.html">Главная</a>&nbsp;<i-->
<!--                        class="fa fa-angle-right"></i>-->
<!--            </li>-->
<!--            <li class="active">Главная</li>-->
<!--        </ol>-->
    </div>
</div>