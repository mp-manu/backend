<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\WorkResults;
use app\modules\admin\models\WorkResultsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * WorkResultsController implements the CRUD actions for WorkResults model.
 */
class WorkResultsController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new WorkResultsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WorkResults model.
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
     * Creates a new WorkResults model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WorkResults();

        if ($model->load(Yii::$app->request->post())) {
            $max_id = WorkResults::find()->max('id');
            if ($max_id == 0) {
                $max_id = 1;
            } else {
                $max_id += 1;
            }
            $resultImage = UploadedFile::getInstance($model, 'img');
            if (!empty($resultImage)) {
                $path = Yii::getAlias('@uploadsroot');
                $fileName = 'work-result_' . $max_id . '.' . $resultImage->extension;
                $resultImage->saveAs($path . '/results/' . $fileName);
                $model->img = $fileName;
            }

            if ($model->save()) {
                Yii::$app->session->setFlash('creatingSuccess', 'Запись успешно сохранено!');
                return $this->redirect(['/admin/services/edit', 'id' => $model->service_id]);
            } else {
                Yii::$app->session->setFlash('creatingError', 'Не удается сохранить запись!');
                return $this->redirect(['/admin/services/edit', 'id' => $model->service_id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing WorkResults model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'onUpdate';
        $max_id = WorkResults::find()->max('id');
        if ($max_id == 0) {
            $max_id = 1;
        } else {
            $max_id = $model->id;
        }
        $old_img = $model->img;

        if ($model->load(Yii::$app->request->post())) {

            $resultImage = UploadedFile::getInstance($model, 'img');
            if (!empty($resultImage)) {
                $path = Yii::getAlias('@uploadsroot');
                $fileName = 'work-result_' . $max_id . '.' . $resultImage->extension;
                $resultImage->saveAs($path . '/results/' . $fileName);
                $model->img = $fileName;
            }else{
                $model->img = $old_img;
            }

            if ($model->save()) {
                Yii::$app->session->setFlash('creatingSuccess', 'Запись успешно сохранено!');
                return $this->redirect(['/admin/services/edit', 'id' => $model->service_id]);
            } else {
                Yii::$app->session->setFlash('creatingError', 'Не удается сохранить запись!');
                return $this->redirect(['create']);
            }
            return $this->redirect(['/admin/services/edit', 'id' => $model->service_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WorkResults model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
       $model = $this->findModel($id);
       $service_id = $model->service_id;
       $model->delete();
       return $this->redirect(['/admin/services/edit', 'id' => $service_id]);
    }

    /**
     * Finds the WorkResults model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WorkResults the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WorkResults::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
