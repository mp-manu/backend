<?php
/**
 * Created by PhpStorm.
 * User: IT_User-144
 * Date: 15.10.2019
 * Time: 16:39
 */

use yii\bootstrap\Tabs;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = 'Редактировать услугу';
$this->params['breadcrumbs'][] = ['label' => 'Все услуги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$display = (count($services) > 0 || !empty($services)) ? true : false;

?>
<?= $this->render('/layouts/page-bar') ?>
<div class="row">
    <div class="col-lg-12">
<!--        <h2>--><?//= $this->title ?><!--</h2>-->
       <?php if (\Yii::$app->session->hasFlash('creatingSuccess')) : ?>
           <div class="alert alert-success alert-dismissible" style="margin-top: 5%;">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span></button>
              <?php echo \Yii::$app->session->getFlash('creatingSuccess'); ?>
           </div>
       <?php endif; ?>
       <?php if (\Yii::$app->session->hasFlash('success')) : ?>
           <div class="alert alert-success alert-dismissible" style="margin-top: 5%;">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span></button>
              <?php echo \Yii::$app->session->getFlash('success'); ?>
           </div>
       <?php endif; ?>
       <?php if (\Yii::$app->session->hasFlash('error')) : ?>
           <div class="alert alert-error alert-dismissible" style="margin-top: 5%;">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span></button>
              <?php echo \Yii::$app->session->getFlash('error'); ?>
           </div>
       <?php endif; ?>
    </div>
    <div class="col-lg-12">
        <div class="card-box">
            <div class="card-head" id="service" data-text="<?= $service_id['id']  ?>">

                <header>
                    <form action="/admin/services/edit" method="get">
                   <?php if (!empty($service_id['name'])): ?>
                       Выбранная УСЛУГА:
                      <?= Html::dropDownList('id', $service_id['id'],
                          ArrayHelper::map($services, 'id', 'name'), ['onchange' => 'this.form.submit()']) ?>
                   <?php endif; ?>
                    </form>
                </header>
            </div>
            <div class="card-body">

               <?php
               echo Tabs::widget([
                   'items' => [
                       [
                           'label' => 'Добавить услугу',
                           'content' => $this->render('_form',
                               [
                                   'model' => $serviceModel,
                                   'services' => $services,
                                   'service_id' => $service_id
                               ]),
                           'active' => true
                       ],
                       [
                           'label' => 'Информация об услуге',
                           'visible' => $display,
                           'content' => $this->render('forms/service-info', [
                               'model' => $serviceInfoModel,
                               'serviceInfoData' => $serviceInfoData,
                               'services' => $services,
                               'service_id' => $service_id
                           ]),
                       ],
                       [
                           'label' => 'Вопросы и ответы',
                           'visible' => $display,
                           'content' => $this->render('forms/_edit-answer-question', [
                               'model' => $answerQuestions,
                               'answerQuestionsData' => $answerQuestionsData,
                               'services' => $services,
                               'service_id' => $service_id
                           ]),
                       ],
                       [
                           'label' => 'Процесс работы',
                           'visible' => $display,
                           'content' => $this->render('forms/work-proccess', [
                               'model' => $workProccess,
                               'workProccessData' => $workProccessData,
                               'services' => $services,
                               'service_id' => $service_id
                           ]),
                       ],
                       [
                           'label' => 'Результат работы',
                           'visible' => $display,
                           'content' => $this->render('forms/work-results', [
                               'model' => $workResults,
                               'workResultsData' => $workResultsData,
                               'services' => $services,
                               'service_id' => $service_id
                           ]),
                       ],
                       [
                           'label' => 'Прайс лист',
                           'visible' => $display,
                           'content' => $this->render('forms/price-list',
                               [
                                   'model' => $priceList,
                                   'priceListData' => $priceListData,
                                   'services' => $services,
                                   'service_id' => $service_id
                               ]),
                       ],
                   ]
               ]);
               ?>
            </div>
        </div>
    </div>
</div>
<style>
    .tab-pane {
        font-weight: normal;
    }
</style>
<?php $this->registerJsFile('@web/admin_assets/js/change-status.js', ['depends' => [yii\web\JqueryAsset::className()]]) ?>