<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\AnswerQuestions;
use app\modules\admin\models\BackMenu;
use app\modules\admin\models\FrontMenu;
use app\modules\admin\models\PriceList;
use app\modules\admin\models\ServiceInfo;
use app\modules\admin\models\WorkProccess;
use app\modules\admin\models\WorkResults;
use Cocur\Slugify\Slugify;
use Yii;
use app\modules\admin\models\Services;
use app\modules\admin\models\ServicesSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ServicesController implements the CRUD actions for Services model.
 */
class ServicesController extends Controller
{

   public function actionIndex()
   {
      $searchModel = new ServicesSearch();
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
      $model = new Services();
      $slug = new Slugify(['rulesets' => ['default', 'russian']]);

      if ($model->load(Yii::$app->request->post())) {

         $serviceImage = UploadedFile::getInstance($model, 'img');
         $id = Services::find()->max('id');
         $maxId = ($id == 0) ? 1 : $id;
         if (!empty($serviceImage)) {
            $path = Yii::getAlias('@uploadsroot');
            $fileName = 'service_cover_' . $maxId . '.' . $serviceImage->extension;
            $serviceImage->saveAs($path . '/services/' . $fileName);
            $model->img = $fileName;
         }
         if (empty($model->parent_id)) {
            $model->parent_id = 0;
         }
         $model->alias = $slug->slugify($model->alias);
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

   public function actionUpdate($id)
   {
      $model = $this->findModel($id);
      $slug = new Slugify(['rulesets' => ['default', 'russian']]);

      $oldImg = $model->img;
      $maxId = Services::find()->max('id');
      if ($maxId == 0) $maxId = 1; else $maxId = $model->id;
      if ($model->load(Yii::$app->request->post())) {
         $serviceImage = UploadedFile::getInstance($model, 'img');
         if (!empty($serviceImage)) {
            $path = Yii::getAlias('@uploadsroot');
            $fileName = 'service_cover_' . $maxId . '.' . $serviceImage->extension;
            $serviceImage->saveAs($path . '/services/' . $fileName);
            $model->img = $fileName;
         } else {
            $model->img = $oldImg;
         }
         if (empty($model->parent_id)) {
            $model->parent_id = 0;
         }
         $model->alias = $slug->slugify($model->alias);
         if ($model->save()) {
            Yii::$app->session->setFlash('success', 'Запись успешно обновлено!');
            return $this->redirect(['view', 'id' => $model->id]);
         } else {
            Yii::$app->session->setFlash('error', 'Не удается обновить запись!');
            return $this->redirect(['create']);
         }
      }

      $services = Services::getServices();
      return $this->render('update', [
          'model' => $model,
          'services' => $services
      ]);
   }

   public function actionDelete($id)
   {
      if ($this->findModel($id)->delete()) {
         Yii::$app->session->setFlash('success', 'Запись успешно удалено!');
      }

      return $this->redirect(['index']);
   }


   public function actionAdd($id = null)
   {

      $id = Html::encode($id);
      if (!empty($id)) {
         $service_id = Services::find()->where(['id' => $id])->asArray()->one();
      }
      $serviceModel = new Services();
      $serviceInfoModel = new ServiceInfo();
      $answerQuestions = new AnswerQuestions();
      $workProccess = new WorkProccess();
      $workResults = new WorkResults();
      $priceList = new PriceList();
      $slug = new Slugify(['rulesets' => ['default', 'russian']]);
      $services = Services::find()->where(['status' => 1])->asArray()->all();

      /**************форма добавление услуг*********************/
      if ($serviceModel->load(Yii::$app->request->post())) {
         $serviceImage = UploadedFile::getInstance($serviceModel, 'img');
         $maxId = Services::find()->max('id');
         if ($maxId == 0) {
            $maxId = 1;
         } else {
            $maxId += 1;
         }
         if (!empty($serviceImage)) {
            $path = Yii::getAlias('@uploadsroot');
            $fileName = 'service_cover_' . $maxId . '.' . $serviceImage->extension;
            $serviceImage->saveAs($path . '/services/' . $fileName);
            $serviceModel->img = $fileName;
         }
         if (empty($serviceModel->parent_id)) {
            $serviceModel->parent_id = 0;
         }
         $service_id['id'] = (empty($service_id['id'])) ? $serviceModel->id : $service_id['id'];
         $serviceModel->alias = $slug->slugify($serviceModel->alias);
         if ($serviceModel->save()) {
            Yii::$app->session->setFlash('success', 'Запись успешно сохранено!');
            return $this->redirect(['add', 'id' => $serviceModel->id]);
         } else {
            Yii::$app->session->setFlash('error', 'Не удается сохранить запись!');
            return $this->redirect(['add', 'id' => $serviceModel->id]);
         }
      }
      /////////////////////Добавление информации об услуги//////////////////////////////////////

      if ($serviceInfoModel->load(Yii::$app->request->post())) {
         $service_id['id'] = (empty($service_id['id'])) ? $serviceInfoModel->service_id : $service_id['id'];

         if ($serviceInfoModel->save()) {
            Yii::$app->session->setFlash('success', 'Запись успешно сохранено!');
            return $this->redirect(['add', 'id' => $service_id['id']]);
         } else {
            Yii::$app->session->setFlash('error', 'Не удается сохранить запись!');
            return $this->redirect(['add', 'id' => $service_id['id']]);
         }
      }

      /////////////////////Добавление вопросов и ответов//////////////////////////////////////

      if ($answerQuestions->load(Yii::$app->request->post())) {
         $service_id['id'] = (empty($service_id['id'])) ? $answerQuestions->service_id : $service_id['id'];
         if ($answerQuestions->save()) {
            Yii::$app->session->setFlash('success', 'Запись успешно сохранено!');
            return $this->redirect(['add', 'id' => $service_id['id']]);
         } else {
            Yii::$app->session->setFlash('error', 'Не удается сохранить запись!');
            return $this->redirect(['add', 'id' => $service_id['id']]);
         }
      }

      /////////////////////Добавление процессов работы//////////////////////////////////////
      if ($workProccess->load(Yii::$app->request->post())) {
         $max_id = WorkProccess::find()->max('id');
         if ($max_id == 0) {
            $max_id = 1;
         } else {
            $max_id += 1;
         }
         $proccessImage = UploadedFile::getInstance($workProccess, 'img');
         if (!empty($proccessImage)) {
            $path = Yii::getAlias('@uploadsroot');
            $fileName = 'work-proccess_' . $max_id . '.' . $proccessImage->extension;
            $proccessImage->saveAs($path . '/proccess/' . $fileName);
            $workProccess->img = $fileName;
         }
         $service_id['id'] = (empty($service_id['id'])) ? $workResults->service_id : $service_id['id'];
         if ($workProccess->save()) {
            Yii::$app->session->setFlash('success', 'Запись успешно сохранено!');
            return $this->redirect(['add', 'id' => $service_id['id']]);
         } else {
            Yii::$app->session->setFlash('error', 'Не удается сохранить запись!');
            return $this->redirect(['add', 'id' => $service_id['id']]);
         }
      }

      /////////////////////Добавление результатов работ//////////////////////////////////////
      if ($workResults->load(Yii::$app->request->post())) {
         $max_id = WorkResults::find()->max('id');
         if ($max_id == 0) {
            $max_id = 1;
         } else {
            $max_id += 1;
         }
         $resultImage = UploadedFile::getInstance($workResults, 'img');
         if (!empty($resultImage)) {
            $path = Yii::getAlias('@uploadsroot');
            $fileName = 'work-result_' . $max_id . '.' . $resultImage->extension;
            $resultImage->saveAs($path . '/results/' . $fileName);
            $workResults->img = $fileName;
         }
         $service_id['id'] = (empty($service_id['id'])) ? $workResults->service_id : $service_id['id'];
         if ($workResults->save()) {
            Yii::$app->session->setFlash('success', 'Запись успешно сохранено!');
            return $this->redirect(['add', 'id' => $service_id['id']]);
         } else {
            Yii::$app->session->setFlash('error', 'Не удается сохранить запись!');
            return $this->redirect(['add', 'id' => $service_id['id']]);
         }
      }

      /*********************************************************************************************
       ****************************PRICELIST SAVE FORM***********************************************
       *********************************************************************************************/

      if ($priceList->load(Yii::$app->request->post())) {

         $priceList->description = (empty($priceList->description)) ? $priceList->signature : $priceList->description;
         if ($priceList->save()) {
            Yii::$app->session->setFlash('success', 'Запись успешно сохранено!');
            $service_id['id'] = (empty($service_id['id'])) ? $priceList->service_id : $service_id['id'];
            return $this->redirect(['add', 'id' => $service_id['id']]);
         } else {
            Yii::$app->session->setFlash('error', 'Не удается сохранить запись!');
            $service_id['id'] = (empty($service_id['id'])) ? $priceList->service_id : $service_id['id'];
            return $this->redirect(['add', 'id' => $service_id['id']]);
         }
      }

      /********************************************************************************************
       *********************************************************************************************
       ********************************************************************************************/

      return $this->render('add', [
          'serviceModel' => $serviceModel,
          'serviceInfoModel' => $serviceInfoModel,
          'answerQuestions' => $answerQuestions,
          'workProccess' => $workProccess,
          'workResults' => $workResults,
          'priceList' => $priceList,
          'services' => $services,
          'service_id' => $service_id
      ]);
   }


   public function actionEdit($id)
   {

      $id = Html::encode($id);
      $serviceModel = $this->findModel($id);
      $serviceInfoModel = $this->findServiceInfoModel($id);
      $answerQuestions = $this->findQuestionModel($id);
      $workProccess = $this->findProcces($id);
      $workResults = $this->findResult($id);
      $priceList = $this->findPriceList($id);
      $slug = new Slugify(['rulesets' => ['default', 'russian']]);

      $answerQuestionsData = AnswerQuestions::find()->where(['service_id' => $id, 'type' => 1])->all();
      $workProccessData = WorkProccess::find()->where(['service_id' => $id])->all();
      $workResultsData = WorkResults::find()->where(['service_id' => $id])->all();
      $priceListData = PriceList::find()->where(['service_id' => $id])->orderBy('type')->all();
      $serviceInfoData = ServiceInfo::find()->where(['service_id' => $id])->all();

      $services = Services::find()->where(['status' => 1])->asArray()->all();
      $service_id['id'] = $id;
      $service_id['name'] = $serviceModel->name;
      $oldServiceImg = $serviceModel->img;

      /**************форма добавление услуг*********************/
      if ($serviceModel->load(Yii::$app->request->post())) {
         $serviceImage = UploadedFile::getInstance($serviceModel, 'img');
         $maxId = Services::find()->max('id');
         if ($maxId == 0) {
            $maxId = 1;
         } else {
            $maxId += 1;
         }
         if (!empty($serviceImage)) {
            $path = Yii::getAlias('@uploadsroot');
            $fileName = 'service_cover_' . $maxId . '.' . $serviceImage->extension;
            $serviceImage->saveAs($path . '/services/' . $fileName);
            $serviceModel->img = $fileName;
         } else {
            $serviceModel->img = $oldServiceImg;
         }
         if (empty($serviceModel->parent_id)) {
            $serviceModel->parent_id = 0;
         }
         $service_id['id'] = (empty($service_id['id'])) ? $serviceModel->id : $service_id['id'];

         $serviceModel->alias = $slug->slugify($serviceModel->alias);

         if ($serviceModel->save()) {
            Yii::$app->session->setFlash('success', 'Запись успешно сохранено!');
            return $this->redirect(['edit', 'id' => $serviceModel->id]);
         } else {
            Yii::$app->session->setFlash('error', 'Не удается сохранить запись!');
            return $this->redirect(['edit', 'id' => $serviceModel->id]);
         }
      }
      /////////////////////Добавление информации об услуги//////////////////////////////////////

      if ($serviceInfoModel->load(Yii::$app->request->post())) {
         $service_id['id'] = (empty($service_id['id'])) ? $serviceInfoModel->service_id : $service_id['id'];
         if ($serviceInfoModel->save()) {
            Yii::$app->session->setFlash('success', 'Запись успешно сохранено!');
            return $this->redirect(['add', 'id' => $service_id['id']]);
         } else {
            Yii::$app->session->setFlash('error', 'Не удается сохранить запись!');
            return $this->redirect(['add', 'id' => $service_id['id']]);
         }
      }


      return $this->render('edit', [
          'serviceModel' => $serviceModel,
          'serviceInfoModel' => $serviceInfoModel,
          'answerQuestions' => $answerQuestions,
          'workProccess' => $workProccess,
          'workResults' => $workResults,
          'priceList' => $priceList,
          'services' => $services,
          'service_id' => $service_id,

          'answerQuestionsData' => $answerQuestionsData,
          'serviceInfoData' => $serviceInfoData,
          'workProccessData' => $workProccessData,
          'workResultsData' => $workResultsData,
          'priceListData' => $priceListData,
      ]);

   }


   protected function findModel($id)
   {
      if (($model = Services::findOne($id)) !== null) {
         return $model;
      }
      throw new NotFoundHttpException('Страница не существует!');
   }

   protected function findServiceInfoModel($id)
   {
      if (($model = ServiceInfo::findOne(['service_id' => $id, 'status' => 1])) !== null) {
         return $model;
      }
      $model = new ServiceInfo();
      return $model;

   }

   protected function findQuestionModel($id)
   {
      if (($model = AnswerQuestions::findOne(['service_id' => $id, 'status' => 1])) !== null) {
         return $model;
      }
      $model = new AnswerQuestions();
      return $model;

   }

   protected function findProcces($id)
   {
      if (($model = WorkProccess::findOne(['service_id' => $id, 'status' => 1])) !== null) {
         return $model;
      }
      $model = new WorkProccess();
      return $model;

   }

   protected function findResult($id)
   {
      if (($model = WorkResults::findOne(['service_id' => $id, 'status' => 1])) !== null) {
         return $model;
      }
      $model = new WorkResults();
      return $model;

   }

   protected function findPriceList($id)
   {
      if (($model = PriceList::findOne(['service_id' => $id, 'status' => 1])) !== null) {
         return $model;
      }
      $model = new PriceList();
      return $model;
   }

   public function actionGetQuestionForm()
   {
      $model = new AnswerQuestions();
      $services = Services::getServices();
      return $this->renderPartial('forms/answer-question', ['model' => $model, 'services' => $services]);
   }
}
