<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Pages;
use Yii;
use app\modules\admin\models\Sections;
use app\modules\admin\models\SectionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SectionsController implements the CRUD actions for Sections model.
 */
class SectionsController extends Controller
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
     * Lists all Sections models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SectionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sections model.
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
     * Creates a new Sections model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sections();

        if ($model->load(Yii::$app->request->post())) {
            $sectionImg = UploadedFile::getInstance($model, 'img');
            $sectionIco = UploadedFile::getInstance($model, 'ico');
            if(!empty($sectionImg)){
                $path = Yii::getAlias('@uploadsroot');
                $imgName = $sectionImg->baseName.'.'.$sectionImg->extension;
                $sectionImg->saveAs($path.$imgName);
                $model->img = $imgName;
            }
            if(!empty($sectionIco)){
                $path = Yii::getAlias('@uploadsroot');
                $icoName = $sectionIco->baseName.'.'.$sectionIco->extension;
                $sectionIco->saveAs($path.$icoName);
                $model->ico = $icoName;
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }
        $pages = Pages::find()->where(['status' => 1])->asArray()->all();
        return $this->render('create', [
            'model' => $model,
            'pages' => $pages,
        ]);
    }

    /**
     * Updates an existing Sections model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldIco = $model->ico;
        $oldImg = $model->img;
        if ($model->load(Yii::$app->request->post())) {
            $sectionImg = UploadedFile::getInstance($model, 'img');
            $sectionIco = UploadedFile::getInstance($model, 'ico');
            if(!empty($sectionImg)){
                $path = Yii::getAlias('@uploadsroot');
                $imgName = $sectionImg->baseName.'.'.$sectionImg->extension;
                $sectionImg->saveAs($path.$imgName);
                $model->img = $imgName;
            }else{
                $model->img = $oldImg;
            }
            if(!empty($sectionIco)){
                $path = Yii::getAlias('@uploadsroot');
                $icoName = $sectionIco->baseName.'.'.$sectionIco->extension;
                $sectionIco->saveAs($path.$icoName);
                $model->ico = $icoName;
            }else{
                $model->ico = $oldIco;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $pages = Pages::find()->where(['status' => 1])->asArray()->all();
        return $this->render('update', [
            'model' => $model,
            'pages' => $pages,
        ]);
    }

    /**
     * Deletes an existing Sections model.
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

    /**
     * Finds the Sections model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sections the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sections::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
