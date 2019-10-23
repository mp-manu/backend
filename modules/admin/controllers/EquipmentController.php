<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Services;
use Yii;
use app\modules\admin\models\Equipment;
use app\modules\admin\models\EquipmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * EquipmentController implements the CRUD actions for Equipment model.
 */
class EquipmentController extends Controller
{

   /**
    * Lists all Equipment models.
    * @return mixed
    */
   public function actionIndex()
   {
      $searchModel = new EquipmentSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      return $this->render('index', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);
   }

   /**
    * Displays a single Equipment model.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
   public function actionView($id)
   {
      return $this->render('view', [
          'model' => $this->findModel($id),
      ]);
   }

   /**
    * Creates a new Equipment model.
    * If creation is successful, the browser will be redirected to the 'view' page.
    * @return mixed
    */
   public function actionCreate()
   {
      $model = new Equipment();

      if($model->load(Yii::$app->request->post())) {
         $max_id = Equipment::find()->max('id');
         if ($max_id == 0) $max_id = 1; else $max_id += 1;
         $equipmentImg = UploadedFile::getInstance($model, 'img');
         if(!empty($equipmentImg)) {
            $path = Yii::getAlias('@uploadsroot');
            $fileName = 'equipment_' . $max_id . '.' . $equipmentImg->extension;
            $equipmentImg->saveAs($path . '/' . $fileName);
            $model->img = $fileName;
         }
         if($model->save()) {
            Yii::$app->session->setFlash('success', 'Запись успешно сохранено!');
            return $this->redirect(['/admin/services/edit', 'id' => $model->service_id]);
         }else {
            Yii::$app->session->setFlash('error', 'Не удается сохранить запись!');
            return $this->redirect(['/admin/services/edit', 'id' => $model->service_id]);
         }
      }

      $services = Services::getServices();

      return $this->render('create', [
          'model' => $model,
          'services' => $services
      ]);
   }

   /**
    * Updates an existing Equipment model.
    * If update is successful, the browser will be redirected to the 'view' page.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
   public function actionUpdate($id)
   {
      $model = $this->findModel($id);
      $oldImg = $model->img;
      $oldId = $model->id;

      if ($model->load(Yii::$app->request->post())) {
         $equipmentImg = UploadedFile::getInstance($model, 'img');
         if (!empty($equipmentImg)) {
            $path = Yii::getAlias('@uploadsroot');
            $fileName = 'equipment_' . $oldId . '.' . $equipmentImg->extension;
            $equipmentImg->saveAs($path . '/' . $fileName);
            $model->img = $fileName;
         }else{
            $model->img = $oldImg;
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
      return $this->render('update', [
          'model' => $model,
          'services' => $services
      ]);
   }

   /**
    * Deletes an existing Equipment model.
    * If deletion is successful, the browser will be redirected to the 'index' page.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
   public function actionDelete($id)
   {
      $model = $this->findModel($id);
      $id = $model->service_id;
      $model->delete();

      return $this->redirect(['/admin/services/edit', 'id' => $id]);
   }

   /**
    * Finds the Equipment model based on its primary key value.
    * If the model is not found, a 404 HTTP exception will be thrown.
    * @param integer $id
    * @return Equipment the loaded model
    * @throws NotFoundHttpException if the model cannot be found
    */
   protected function findModel($id)
   {
      if (($model = Equipment::findOne($id)) !== null) {
         return $model;
      }

      throw new NotFoundHttpException('The requested page does not exist.');
   }
}
