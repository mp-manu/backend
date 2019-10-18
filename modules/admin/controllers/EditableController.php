<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 07.10.2019
 * Time: 17:11
 */

namespace app\modules\admin\controllers;

use app\models\Requisites;
use app\modules\admin\models\AnswerQuestions;
use app\modules\admin\models\FrontMenu;
use app\modules\admin\models\PriceList;
use app\modules\admin\models\Sections;
use app\modules\admin\models\Services;
use app\modules\admin\models\WorkProccess;
use app\modules\admin\models\WorkResults;
use yii\web\Controller;
use app\modules\admin\models\Slider;
use kartik\grid\EditableColumnAction;
use Yii;

class EditableController extends Controller
{
   public function actions()
   {
      return [
          'chenge-slide-access' => [
              'class' => EditableColumnAction::classname(),
              'modelClass' => Slider::className(),
          ],
          'chenge-order' => [
              'class' => EditableColumnAction::classname(),
              'modelClass' => Slider::className(),
          ],
          'work-result-status' => [
              'class' => EditableColumnAction::classname(),
              'modelClass' => WorkResults::className(),
          ],
          'work-proccess-status' => [
              'class' => EditableColumnAction::classname(),
              'modelClass' => WorkProccess::className(),
          ],
          'service-status' => [
              'class' => EditableColumnAction::classname(),
              'modelClass' => Services::className(),
          ],
          'answer-question-status' => [
              'class' => EditableColumnAction::classname(),
              'modelClass' => AnswerQuestions::className(),
          ],
          'front-menu-access' => [
              'class' => EditableColumnAction::classname(),
              'modelClass' => FrontMenu::className(),
          ],
          'requisites-status' => [
              'class' => EditableColumnAction::classname(),
              'modelClass' => Requisites::className(),
          ],
          'price-list' => [
              'class' => EditableColumnAction::classname(),
              'modelClass' => PriceList::className(),
          ],
          'section-status' => [
              'class' => EditableColumnAction::classname(),
              'modelClass' => Sections::className(),
          ],

      ];
   }


   public function actionChangeQuestionStatus()
   {

      if (Yii::$app->request->post()) {
         $q_id = Yii::$app->request->post('id');
         $status = Yii::$app->request->post('status');
         if ($status == 0) {
            $status = 1;
         } elseif ($status == 1) {
            $status = 0;
         } else {
            $status = 0;
         }
         Yii::$app->db->createCommand('UPDATE answer_questions SET status = ' . $status . ' WHERE id=' . $q_id)->execute();
         return $status;
      }
   }

   public function actionChangeProccessStatus()
   {
      if (Yii::$app->request->post()) {
         $q_id = Yii::$app->request->post('id');
         $status = Yii::$app->request->post('status');
         if ($status == 0) {
            $status = 1;
         } elseif ($status == 1) {
            $status = 0;
         } else {
            $status = 0;
         }
         Yii::$app->db->createCommand('UPDATE work_proccess SET status = ' . $status . ' WHERE id=' . $q_id)->execute();
         return $status;
      }
   }

   public function actionChangeResultStatus()
   {
      if (Yii::$app->request->post()) {
         $q_id = Yii::$app->request->post('id');
         $status = Yii::$app->request->post('status');
         if ($status == 0) {
            $status = 1;
         } elseif ($status == 1) {
            $status = 0;
         } else {
            $status = 0;
         }
         Yii::$app->db->createCommand('UPDATE work_results SET status = ' . $status . ' WHERE id=' . $q_id)->execute();
         return $status;
      }
   }


   public function actionChangePricelistStatus()
   {
      if (Yii::$app->request->post()) {
         $q_id = Yii::$app->request->post('id');
         $status = Yii::$app->request->post('status');
         if ($status == 0) {
            $status = 1;
         } elseif ($status == 1) {
            $status = 0;
         } else {
            $status = 0;
         }
         Yii::$app->db->createCommand('UPDATE price_list SET status = ' . $status . ' WHERE id=' . $q_id)->execute();
         return $status;
      }
   }


   public function actionChangeServiceinfoStatus()
   {
      if (Yii::$app->request->post()) {
         $q_id = Yii::$app->request->post('id');
         $status = Yii::$app->request->post('status');
         if ($status == 0) {
            $status = 1;
         } elseif ($status == 1) {
            $status = 0;
         } else {
            $status = 0;
         }
         Yii::$app->db->createCommand('UPDATE service_info SET status = ' . $status . ' WHERE id=' . $q_id)->execute();
         return $status;
      }
   }

}