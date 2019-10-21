<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Services;
use app\modules\admin\models\Slider;
use Yii;
use app\modules\admin\models\WorkProccess;
use app\modules\admin\models\WorkProccessSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * WorkProccessController implements the CRUD actions for WorkProccess model.
 */
class WorkProccessController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new WorkProccessSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WorkProccess model.
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
     * Creates a new WorkProccess model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WorkProccess();
        if ($model->load(Yii::$app->request->post())) {
            $max_id = WorkProccess::find()->max('id');
            if ($max_id == 0) {
                $max_id = 1;
            } else {
                $max_id += 1;
            }
            $proccessImage = UploadedFile::getInstance($model, 'img');
            if (!empty($proccessImage)) {
                $path = Yii::getAlias('@uploadsroot');
                $fileName = 'work-proccess_' . $max_id . '.' . $proccessImage->extension;
                $proccessImage->saveAs($path . '/proccess/' . $fileName);
                $model->img = $fileName;
            }
            if(empty($model->description)) $model->description = $model->title;
            //debug($model);
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

    /**
     * Updates an existing WorkProccess model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'onUpdate';
        $old_img = $model->img;

        if ($model->load(Yii::$app->request->post())) {
            $max_id = WorkProccess::find()->max('id');
            if ($max_id == 0) {
                $max_id = 1;
            } else {
                $max_id = $model->id;
            }
            $proccessImage = UploadedFile::getInstance($model, 'img');
            if (!empty($proccessImage)) {
                $path = Yii::getAlias('@uploadsroot');
                $fileName = 'work-proccess_' . $max_id . '.' . $proccessImage->extension;
                $proccessImage->saveAs($path . '/proccess/' . $fileName);
                $model->img = $fileName;
            }else{
                $model->img = $old_img;
            }
           if(empty($model->description)) $model->description = $model->title;
            if ($model->save()) {
                Yii::$app->session->setFlash('creatingSuccess', 'Запись успешно сохранено!');
                return $this->redirect(['/admin/services/edit', 'id' => $model->service_id]);
            } else {
                Yii::$app->session->setFlash('creatingError', 'Не удается сохранить запись!');
                return $this->redirect(['/admin/services/edit', 'id' => $model->service_id]);
            }
        }

        $services = Services::getServices();
        return $this->render('update', [
            'model' => $model,
            'services' => $services,
        ]);
    }

    /**
     * Deletes an existing WorkProccess model.
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
     * Finds the WorkProccess model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WorkProccess the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WorkProccess::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
