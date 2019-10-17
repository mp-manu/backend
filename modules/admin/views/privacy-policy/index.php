<?php

use app\modules\admin\models\PrivacyPolicy;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PrivacyPolicySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ САЙТА';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="privacy-policy-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

   <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card-box">
        <div class="card-head">
            <header><?= $this->title ?></header>
        </div>
        <div class="card-body">
           <?= GridView::widget([
               'dataProvider' => $dataProvider,
               'filterModel' => $searchModel,
               'columns' => [
                   ['class' => 'yii\grid\SerialColumn'],

                   'id',
                   [
                       'attribute' => 'parent_id',
                       'filter' => ArrayHelper::map(PrivacyPolicy::getAllParents(), 'id', 'title'),
                       'value' => function ($dataProvider) {
                          $text = PrivacyPolicy::getParentsNameById($dataProvider->parent_id);
                          return $text['title'];
                       }
                   ],

                   [
                       'attribute' => 'description',
                       'format' => 'html',
                       'value' => function ($dataProvider) {
                          return wordwrap($dataProvider->description, 80, '<br>');
                       }
                   ],
                   'status',

                   ['class' => 'yii\grid\ActionColumn'],
               ],
           ]); ?>

        </div>
    </div>
</div>
