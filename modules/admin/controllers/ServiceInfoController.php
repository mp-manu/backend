<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Services;
use Yii;
use app\modules\admin\models\ServiceInfo;
use app\modules\admin\models\ServiceInfoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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

        if ($model->load(Yii::$app->request->post())) {
            //debug($model);
            $model->save();
            return $this->redirect(['/admin/services/edit', 'id' => $model->service_id]);
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/admin/services/edit', 'id' => $model->service_id]);
        }
        $services = Services::getServices();
        return $this->render('update', [
            'model' => $model,
            'services' => $services,
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
