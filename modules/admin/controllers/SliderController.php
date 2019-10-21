<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Slider;
use app\modules\admin\models\SliderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SliderController implements the CRUD actions for Slider model.
 */
class SliderController extends Controller
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
     * Lists all Slider models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SliderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $slideOrders = Slider::getOrders();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'slideOrders' => $slideOrders
        ]);
    }

    /**
     * Displays a single Slider model.
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
     * Creates a new Slider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Slider();

        if ($model->load(Yii::$app->request->post())) {
            $max_id = Slider::find()->max('id');
            if($max_id == 0){
                $max_id = 1;
            }else{
                $max_id += 1;
            }

            $slide_image = UploadedFile::getInstance($model, 'img_url');
            $slide_cover = UploadedFile::getInstance($model, 'slide_cover');
           $path = Yii::getAlias('@uploadsroot');
            if(!empty($slide_image)){

                $fileName = 'slide-cover_'.$max_id.'.'.$slide_image->extension;
                $slide_image->saveAs($path.'/slider/'.$fileName);
                $model->img_url = $fileName;
            }
            if(!empty($slide_cover)){
                $fileNameCover = 'slide-cover-img-'.$max_id.'.'.$slide_cover->extension;
                $slide_cover->saveAs($path.'/slider/'.$fileNameCover);
                $model->slide_cover = $fileNameCover;
            }

            $model->access = 1;
            $model->order = Slider::setSlideOrder($model->order);
            if(empty($model->btn_title)) $model->btn_title='Заказать по чертежу';
            if($model->save()){
                Yii::$app->session->setFlash('creatingSuccess', 'Запись успешно сохранено!');
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->session->setFlash('creatingError', 'Не удается сохранить запись!');
                return $this->redirect(['create']);
            }

        }
        $sliders = Slider::getSliders();

        return $this->render('create', [
            'model' => $model,
            'sliders' => $sliders,
        ]);
    }

    /**
     * Updates an existing Slider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        $model->scenario = 'onUpdate';

        $max_id = $model->id;
        if($max_id == 0){
            $max_id = 1;
        }else{
            $max_id = $model->id;
        }
        $old_img = $model->img_url;
        $old_cover = $model->slide_cover;
        if ($model->load(Yii::$app->request->post())) {
            $slide_image = UploadedFile::getInstance($model, 'img_url');
            $slide_cover = UploadedFile::getInstance($model, 'slide_cover');
           $path = Yii::getAlias('@uploadsroot');
            if(!empty($slide_image)){
                $fileName = 'slide-cover_'.$max_id.'.'.$slide_image->extension;
                $slide_image->saveAs($path.'/slider/'.$fileName);
                $model->img_url = $fileName;
            }else{
                $model->img_url = $old_img;
            }
            if(!empty($slide_cover)){
                $fileNameCover = 'slide-cover-img-'.$max_id.'.'.$slide_cover->extension;
                $slide_cover->saveAs($path.'/slider/'.$fileNameCover);
                $model->slide_cover = $fileNameCover;
            }else{
                $model->slide_cover = $old_cover;
            }

            $model->access = 1;
            $model->order = Slider::setSlideOrder($model->order);
            if(empty($model->btn_title)) $model->btn_title='Заказать по чертежу';
            if($model->save(false)){
                Yii::$app->session->setFlash('creatingSuccess', 'Запись успешно сохранено!');
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->session->setFlash('creatingError', 'Не удается сохранить запись!');
                return $this->redirect(['create']);
            }
        }
        $sliders = Slider::getSlidersWithoutMe($model->id);
        return $this->render('update', [
            'model' => $model,
            'sliders' => $sliders,
        ]);
    }

    /**
     * Deletes an existing Slider model.
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
     * Finds the Slider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slider::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
