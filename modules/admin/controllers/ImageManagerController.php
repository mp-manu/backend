<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\ImageModel;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii2mod\editable\EditableAction;
use yii2mod\settings\models\SettingModel;


class ImageManagerController extends Controller
{
    /**
     * @var string path to index view file, which is used in admin panel
     */
    public $indexView = '@app/modules/admin/views/image-manager/index';

    /**
     * @var string path to create view file, which is used in admin panel
     */
    public $createView = '@app/modules/admin/views/image-manager/create';

    /**
     * @var string path to update view file, which is used in admin panel
     */
    public $updateView = '@app/modules/admin/views/image-manager/update';

    /**
     * @var string search class name for searching
     */
    public $searchClass = 'app\modules\admin\models\search\ImageSearch';

    /**
     * @var string model class name for CRUD operations
     */
    public $modelClass = 'app\modules\admin\models\ImageModel';

    /**
     * Returns a list of behaviors that this component should behave as.
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get'],
                    'create' => ['get', 'post'],
                    'update' => ['get', 'post'],
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Return a list of actions
     *
     * @return array
     */
    public function actions()
    {

        return [
            'edit-setting' => [
                'class' => EditableAction::className(),
                'modelClass' => ImageModel::className(),
                'forceCreate' => false,
            ],
        ];
    }

    /**
     * Lists all Settings.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = Yii::createObject($this->searchClass);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render($this->indexView, [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Setting.
     *
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = Yii::createObject($this->modelClass);

        if ($model->load(Yii::$app->request->post())) {

            $img = UploadedFile::getInstance($model, 'img');
            if(!empty($img)){
                $path = Yii::getAlias('@uploadsroot').'/';
                $imgName = $img->baseName.'.'.$img->extension;
                  $model->img = $imgName;
                  $model->value = $imgName;
                $img->saveAs($path.$imgName);

            }

            $model->save();
            Yii::$app->session->setFlash('success', Yii::t('yii2mod.settings', 'Setting has been created.'));

            return $this->redirect(['index']);
        } else {
            return $this->render($this->createView, [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Setting.
     *
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdate(int $id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'onUpdate';
        $oldImg = $model->img;
        if ($model->load(Yii::$app->request->post())) {
            $img = UploadedFile::getInstance($model, 'img');
            if(!empty($img)){
                $path = Yii::getAlias('@uploadsroot');
                $imgName = $img->baseName.'.'.$img->extension;
                $img->saveAs($path.'/'.$imgName);
                $model->img = $imgName;
                $model->value = $imgName;
            }else{
                $model->img = $oldImg;
                $model->value = $oldImg;
            }
            $model->save();
            Yii::$app->session->setFlash('success', Yii::t('yii2mod.settings', 'Setting has been updated.'));
            return $this->redirect(['index']);
        } else {
            return $this->render($this->updateView, [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Setting.
     *
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionDelete(int $id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', Yii::t('yii2mod.settings', 'Setting has been deleted.'));

        return $this->redirect(['index']);
    }

    /**
     * Finds a Setting model based on its primary key value.
     *
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @return SettingModel the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id)
    {
        $settingModelClass = $this->modelClass;

        if (($model = $settingModelClass::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('yii2mod.settings', 'The requested page does not exist.'));
        }
    }
}
