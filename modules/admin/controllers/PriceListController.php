<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Services;
use Yii;
use app\modules\admin\models\PriceList;
use app\modules\admin\models\PriceListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PriceListController implements the CRUD actions for PriceList model.
 */
class PriceListController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new PriceListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PriceList model.
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
     * Creates a new PriceList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PriceList();

        if ($model->load(Yii::$app->request->post())) {
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
     * Updates an existing PriceList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
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
     * Deletes an existing PriceList model.
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
     * Finds the PriceList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PriceList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PriceList::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
