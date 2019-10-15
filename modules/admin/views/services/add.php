<?php
/**
 * Created by PhpStorm.
 * User: IT_User-144
 * Date: 15.10.2019
 * Time: 16:39
 */

use yii\bootstrap\Tabs;

$this->title = 'Добавить услугу';
?>
<h2><?= $this->title ?></h2>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="card-head">
                <header></header>
            </div>
            <div class="card-head">
               <?php
               echo Tabs::widget([
                   'items' => [
                       [
                           'label' => 'Добавить услугу',
                           'content' => $this->render('_form', ['model' => $serviceModel, 'services' => $services]),
                           'active' => true
                       ],
                       [
                           'label' => 'Информация об услуге',
                           'content' => $this->render('forms/service-info', ['model' => $serviceInfoModel, 'services' => $services]),
                       ],
                       [
                           'label' => 'Процесс работы',
                           'content' => $this->render('forms/work-proccess', ['model' => $workProccess, 'services' => $services]),
                       ],
                       [
                           'label' => 'Результат работы',
                           'content' => $this->render('forms/work-results', ['model' => $workResults, 'services' => $services]),
                       ],
                       [
                           'label' => 'Прайс лист',
                           'content' => $this->render('forms/price-list', ['model' => $priceList, 'services' => $services]),
                       ],
                   ]
               ]);
               ?>
            </div>
        </div>
    </div>
</div>
<style>
    input, select {
        font-weight: normal;
    }
</style>
