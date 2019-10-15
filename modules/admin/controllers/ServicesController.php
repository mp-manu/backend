<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\AnswerQuestions;
use app\modules\admin\models\BackMenu;
use app\modules\admin\models\FrontMenu;
use app\modules\admin\models\PriceList;
use app\modules\admin\models\ServiceInfo;
use app\modules\admin\models\WorkProccess;
use app\modules\admin\models\WorkResults;
use Yii;
use app\modules\admin\models\Services;
use app\modules\admin\models\ServicesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ServicesController implements the CRUD actions for Services model.
 */
class ServicesController extends Controller
{
   /**
    * {@inheritdoc}
    */
   public function behaviors()
   {
      return [
          'verbs' => [
              'class' => VerbFilter::className(),
              'actions' => [
                  'delete' => ['POST'],
              ],
          ],
      ];
   }

   /**
    * Lists all Services models.
    * @return mixed
    */
   public function actionIndex()
   {
      $searchModel = new ServicesSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      return $this->render('index', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);
   }

   /**
    * Displays a single Services model.
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
    * Creates a new Services model.
    * If creation is successful, the browser will be redirected to the 'view' page.
    * @return mixed
    */
   public function actionCreate()
   {
      $model = new Services();


      if ($model->load(Yii::$app->request->post())) {

         $serviceImage = UploadedFile::getInstance($model, 'img');
         $id = Services::find()->max('id');
         $maxId = ($id == 0) ? 1 : $id;
         if (!empty($serviceImage)) {
            $path = Yii::getAlias('@webroot') . '/img';
            $fileName = 'service_cover_' . $maxId . '.' . $serviceImage->extension;
            $serviceImage->saveAs($path . '/services/' . $fileName);
            $model->img = $fileName;
         }
         if (empty($model->parent_id)) {
            $model->parent_id = 0;
         }
         if ($model->save()) {


            Yii::$app->session->setFlash('creatingSuccess', 'Запись успешно сохранено!');
            return $this->redirect(['view', 'id' => $model->id]);
         } else {
            Yii::$app->session->setFlash('creatingError', 'Не удается сохранить запись!');
            return $this->redirect(['create']);
         }
      }

      $services = Services::getServices();

      return $this->render('create', [
          'model' => $model,
          'services' => $services,
      ]);
   }


   /**
    * Updates an existing Services model.
    * If update is successful, the browser will be redirected to the 'view' page.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
   public function actionUpdate($id)
   {
      $model = $this->findModel($id);


      $oldImg = $model->img;
      $maxId = Services::find()->max('id');
      if ($maxId == 0) $maxId = 1; else $maxId = $model->id;
      if ($model->load(Yii::$app->request->post())) {
         $serviceImage = UploadedFile::getInstance($model, 'img');
         if (!empty($serviceImage)) {
            $path = Yii::getAlias('@webroot') . '/img';
            $fileName = 'service_cover_' . $maxId . '.' . $serviceImage->extension;
            $serviceImage->saveAs($path . '/services/' . $fileName);
            $model->img = $fileName;
         } else {
            $model->img = $oldImg;
         }
         if (empty($model->parent_id)) {
            $model->parent_id = 0;
         }

         if ($model->save()) {
            Yii::$app->session->setFlash('creatingSuccess', 'Запись успешно обновлено!');
            return $this->redirect(['view', 'id' => $model->id]);
         } else {
            Yii::$app->session->setFlash('creatingError', 'Не удается обновить запись!');
            return $this->redirect(['create']);
         }
      }

      $services = Services::getServices();
      return $this->render('update', [
          'model' => $model,
          'services' => $services
      ]);
   }


   /**
    * Deletes an existing Services model.
    * If deletion is successful, the browser will be redirected to the 'index' page.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
   public function actionDelete($id)
   {
      $this->findModel($id)->delete();

      return $this->redirect(['index']);
   }



   public function actionAdd(){

      $serviceModel = new Services();
      $serviceInfoModel = new ServiceInfo();
      $answerQuestions = new AnswerQuestions();
      $workProccess = new WorkProccess();
      $workResults = new WorkResults();
      $priceList = new PriceList();
      $services = Services::find()->where(['status' => 1])->asArray()->all();

      return $this->render('add', [
          'serviceModel' => $serviceModel,
          'serviceInfoModel' => $serviceInfoModel,
          'answerQuestions' => $answerQuestions,
          'workProccess' => $workProccess,
          'workResults' => $workResults,
          'priceList' => $priceList,
          'services' => $services
      ]);
   }

   /**
    * Finds the Services model based on its primary key value.
    * If the model is not found, a 404 HTTP exception will be thrown.
    * @param integer $id
    * @return Services the loaded model
    * @throws NotFoundHttpException if the model cannot be found
    */
   protected function findModel($id)
   {
      if (($model = Services::findOne($id)) !== null) {
         return $model;
      }

      throw new NotFoundHttpException('The requested page does not exist.');
   }
}
