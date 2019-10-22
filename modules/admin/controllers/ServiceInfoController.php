<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Services;
use Yii;
use app\modules\admin\models\ServiceInfo;
use app\modules\admin\models\ServiceInfoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class ServiceInfoController extends Controller
{


   public function actionIndex()
   {
      $searchModel = new ServiceInfoSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      return $this->render('index', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);
   }


   public function actionView($id)
   {
      return $this->render('view', [
          'model' => $this->findModel($id),
      ]);
   }


   public function actionCreate()
   {
      $model = new ServiceInfo();
      $maxId = ServiceInfo::find()->max('id');
      if($maxId==0){
         $maxId=1;
      }else{
         $maxId+=1;
      }
      if ($model->load(Yii::$app->request->post())) {
         $serviceInfoImg = UploadedFile::getInstance($model, 'img');
         if (!empty($serviceInfoImg)) {
            $path = Yii::getAlias('@uploadsroot');
            $fileName = 'service-info_' . $maxId . '.' . $serviceInfoImg->extension;
            $serviceInfoImg->saveAs($path . '/services/' . $fileName);
            $model->img = $fileName;
         }
         if ($model->save()) {
            Yii::$app->session->setFlash('success', 'Запись успешно сохранено!');
            return $this->redirect(['/admin/services/edit', 'id' => $model->service_id]);
         } else {
            Yii::$app->session->setFlash('error', 'Не удается сохранить запись!');
            return $this->redirect(['/admin/services/edit', 'id' => $model->service_id]);
         }
      }

      $services = Services::getServices();
      return $this->render('create', [
          'model' => $model,
          'services' => $services,
      ]);
   }


   public function actionUpdate($id)
   {
      $model = $this->findModel($id);

      $oldImg = $model->img;
      $oldId = $model->id;

      if ($model->load(Yii::$app->request->post())) {

         $serviceInfoImg = UploadedFile::getInstance($model, 'img');
         if (!empty($serviceInfoImg)) {
            $path = Yii::getAlias('@uploadsroot');
            $fileName = 'service-info_' . $oldId . '.' . $serviceInfoImg->extension;
            $serviceInfoImg->saveAs($path . '/services/' . $fileName);
            $model->img = $fileName;
         }else{
            $model->img = $oldImg;
         }
         if($model->save()){
            Yii::$app->session->setFlash('success', 'Запись успешно обновлено!');
         }else{
            Yii::$app->session->setFlash('error', 'Не удается обновить запись!');
         }
         return $this->redirect(['/admin/services/edit', 'id' => $model->service_id]);
      }

      return $this->render('update', [
          'model' => $model,
      ]);
   }


   public function actionDelete($id)
   {
      $model = $this->findModel($id);
      $service_id = $model->service_id;
      $model->delete();
      return $this->redirect(['/admin/services/edit', 'id' => $service_id]);
   }


   protected function findModel($id)
   {
      if (($model = ServiceInfo::findOne($id)) !== null) {
         return $model;
      }

      throw new NotFoundHttpException('The requested page does not exist.');
   }
}
