<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 07.10.2019
 * Time: 17:11
 */

namespace app\modules\admin\controllers;

use Yii;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\web\Controller;
use app\models\User;
use app\models\LoginForm;
use app\models\LoginDetails;
use yii\web\UploadedFile;

class UserController extends Controller
{
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

    public function actionList()
    {

        $users = User::getUserList();

        return $this->render('list', [
            'users' => $users
        ]);
    }


    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {
            $model->user_password = md5($model->user_password . $model->user_password);
            $model->created_by = Yii::$app->user->id;
            $model->created_at = (new Expression('NOW()'));
            $userImg = UploadedFile::getInstance($model, 'avatar');
            if (!empty($userImg)) {
                $path = Yii::getAlias('@webroot') . '/admin_assets/img/prof/';
                $imgName = $userImg->baseName . '.' . $userImg->extension;
                $userImg->saveAs($path . $imgName);
                $model->avatar = $imgName;
            } else {
                $model->avatar = 'default-prof.jpg';
            }

            $type = $model->user_type;
            $model->save();
            $uid = Yii::$app->db->getlastInsertID();
            $auth = Yii::$app->authManager;
            if ($type == 'A') {
                $authorRole = $auth->getPermission('Администратор');
                $auth->assign($authorRole, $uid);
            } elseif ($type == 'E') {
                $authorRole = $auth->getPermission('Администратор');
                $auth->assign($authorRole, $uid);
            }

            return $this->redirect(['view', 'id' => $model->user_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old_img = $model->avatar;
        $old_type = $model->user_type;
        if ($model->load(Yii::$app->request->post())) {
            $model->user_password = md5($model->user_password . $model->user_password);
            $model->created_by = Yii::$app->user->id;
            $model->created_at = (new Expression('NOW()'));
            $userImg = UploadedFile::getInstance($model, 'avatar');
            if (!empty($userImg)) {
                $path = Yii::getAlias('@webroot') . '/admin_assets/img/prof/';
                $imgName = $userImg->baseName . '.' . $userImg->extension;
                $userImg->saveAs($path . $imgName);
                $model->avatar = $imgName;
            } else {
                $model->avatar = $old_img;
            }

            $type = $model->user_type;
            $model->save();
            if ($old_type != $type) {
                $uid = Yii::$app->db->getlastInsertID();
//                $auth = Yii::$app->authManager;
                if ($type == 'A') {
                    Yii::$app->db->createCommand('UPDATE auth_assignment SET item_name = "Администратор" WHERE user_id = '.$uid)->execute();
                } elseif ($type == 'E') {
//                    $authorRole = $auth->getPermission('Администратор');
                    Yii::$app->db->createCommand('UPDATE auth_assignment SET item_name = "Сотрудник" WHERE user_id = '.$uid)->execute();
                }
            }
            return $this->redirect('/admin/user/list');
        }


        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $uid = Html::encode($id);
        Yii::$app->db->createCommand('UPDATE user SET is_block = 1 WHERE user_id = '.$uid)->execute();

        return $this->redirect(['/admin/user/list']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionProfile()
    {


        // TODO: Manuchehr
        return $this->redirect('/admin/main/login');
    }

    public function actionLoginDetails()
    {
        // TODO: Manuchehr
    }

    public function actionChangePassword()
    {
        return parent::actions(); // TODO: Manuchehr
    }

}