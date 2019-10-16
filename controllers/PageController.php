<?php

namespace app\controllers;

use app\models\Requisites;
use app\modules\admin\models\AnswerQuestions;
use app\modules\admin\models\PriceList;
use app\modules\admin\models\Sections;
use app\modules\admin\models\ServiceInfo;
use app\modules\admin\models\Services;
use app\modules\admin\models\WorkProccess;
use app\modules\admin\models\WorkResults;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Controller;

class PageController extends Controller
{

   public function actions()
   {
      return [
          'error' => [
              'class' => 'yii\web\ErrorAction',
          ],
      ];
   }

   public function actionService($id)
   {
      $id = Html::encode($id);
      $service = Services::find()->where(['id' => $id, 'status' => 1])->asArray()->one();

      if(empty($service)) return $this->goHome();

      $serviceInfo = ServiceInfo::find()->where(['service_id' => $id, 'status' => 1])->all();
      $answerQuestions = AnswerQuestions::find()->where(['service_id' => $id, 'status' => 1, 'type' => 1])->all();
      $workProccess = WorkProccess::find()->where(['service_id' => $id, 'status' => 1])->all();
      $workResults = WorkResults::find()->where(['service_id' => $id, 'status' => 1,])->all();
      $subServices = Services::find()
          ->select('s.*, si.key, si.val, si.description as desc, si.img')
          ->from('services s')
          ->join('LEFT JOIN', 'service_info si', 's.id=si.service_id')
          ->where(['parent_id' => $id, 's.status' => 1])
          ->asArray()->all();
      $priceList = PriceList::find()->where(['service_id' => $id, 'status' => 1])->all();

      $servicesAndSubservices[$id]=$id;
      $servicesAndSubservices = ArrayHelper::map($subServices, 'id', 'id');


      $priceListTable = PriceList::find()
          ->select('p.*, s.name, s.id as sid')
          ->from('price_list p')
          ->leftJoin('services s', 'p.service_id=s.id')
          ->where(['s.id' => $servicesAndSubservices, 'p.type' => 2, 's.status' => 1, 'p.status' => 1])
          ->asArray()->all();

      if(!empty($priceListTable)){
         $data = array();
         $activeServicesId = array();
         foreach ($priceListTable as $list) {
            $activeServicesId[$list['sid']] = $list['sid'];
            $data['name'][$list['sid']] = $list['name'];
            $data['length'][$list['sid']][$list['length']] = $list['length'];
            $data['depth'][$list['sid']][$list['depth']] = $list['depth'];
            $data['price'][$list['length']][$list['depth']][$list['sid']] = $list['price'];
         }
      }

      return $this->render('service', [
          'service' => $service,
          'serviceInfo' => $serviceInfo,
          'answerQuestions' => $answerQuestions,
          'workProccess' => $workProccess,
          'workResults' => $workResults,
          'subServices' => $subServices,
          'activeServicesId' => $activeServicesId,
          'priceList' => $priceList,
          'data' => $data,

      ]);
   }

   public function actionContact()
   {
      $reqvisit = Requisites::find()->where(['status' => 1])->asArray()->one();

      return $this->render('contact', [
          'reqvisit' => $reqvisit
      ]);
   }

   public function actionAbout()
   {
      $howWeWork = Sections::getSectionsByType(2);
      $whyChooseUs = Sections::getSectionsByType(1);
      $banner = Sections::getSectionsByType(3);
      $info = Sections::getSectionsByType(4);
      $history = Sections::getSectionsByType(5);

      return $this->render('about', [
          'howWeWork' => $howWeWork,
          'whyChooseUs' => $whyChooseUs,
          'banner' => $banner,
          'info' => $info,
          'history' => $history,
      ]);
   }

   public function actionThanks()
   {
      $sectionThanks = Sections::find()->where(['page_id' => 7, 'status' => 1])->asArray()->one();
      //debug($sectionThanks);
      return $this->render('thanks', [
          'sectionThanks' => $sectionThanks
      ]);
   }

   public function actionError()
   {
      $errorPage = Sections::find()->where(['page_id' => 6])->asArray()->one();
      return $this->render('error', [
          'errorPage' => $errorPage
      ]);
   }

   public function beforeAction($action)
   {
      if (parent::beforeAction($action)) {
         if ($action->id == 'error' || $action->id == 'contact' || $action->id == 'thanks') {
            $this->layout = 'main-dark';
         }
         return true;
      }
   }
}
