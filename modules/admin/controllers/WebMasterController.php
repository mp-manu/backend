<?php
/**
 * Created by PhpStorm.
 * User: IT_User-144
 * Date: 23.10.2019
 * Time: 10:48
 */

namespace app\modules\admin\controllers;


use app\models\Contact;
use app\modules\admin\models\CompanyMap;
use app\modules\admin\models\MetatagsYandexMetrika;
use Yii;
use yii\db\Query;
use yii\web\Controller;

class WebMasterController extends Controller
{

   public function actionMetaTagsAndYametrikaScripts()
   {
      $data = (new Query())->select('*')->from('metatags_yandex_metrika')->all();

      return $this->render('meta-tags-and-yametrika-scripts', [
          'data' => $data
      ]);
   }

   public function actionMetaTagsAndYametrikaScriptsAdd()
   {
      $model = new MetatagsYandexMetrika();

      if ($model->load(Yii::$app->request->post())) {
         if ($model->save()) {
            Yii::$app->session->setFlash('success', 'Запись успешно сохранено!');
            return $this->redirect(['meta-tags-and-yametrika-scripts']);
         } else {
            Yii::$app->session->setFlash('error', 'Не удается сохранить запись!');
            return $this->redirect(['meta-tags-and-yametrika-scripts']);
         }
      }

      return $this->render('add', [
          'model' => $model
      ]);
   }


   public function actionMetaTagsAndYametrikaScriptsEdit($id)
   {
      $model = $this->findModel($id);

      if ($model->load(Yii::$app->request->post())) {
         if ($model->save()) {
            Yii::$app->session->setFlash('success', 'Запись успешно сохранено!');
            return $this->redirect(['meta-tags-and-yametrika-scripts']);
         } else {
            Yii::$app->session->setFlash('error', 'Не удается сохранить запись!');
            return $this->redirect(['meta-tags-and-yametrika-scripts']);
         }
      }
      return $this->render('update', [
          'model' => $model
      ]);
   }



   public function actionContactMap(){

      $model = CompanyMap::findOne(1);

      return $this->render('map', [
          'model' => $model
      ]);
   }


   protected function findModel($id)
   {
      if (($model = MetatagsYandexMetrika::findOne($id)) !== null) {
         return $model;
      }

      throw new NotFoundHttpException('The requested page does not exist.');
   }
}