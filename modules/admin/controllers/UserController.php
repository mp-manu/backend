<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 07.10.2019
 * Time: 17:11
 */

namespace app\modules\admin\controllers;

use app\models\CallRequest;
use app\models\Contact;
use app\models\OrderByDrawing;
use app\modules\admin\models\AnswerQuestions;
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
        $user = User::find()->where(['user_id' => Yii::$app->user->id])->asArray()->one();

        return $this->render('profile', [
            'user' => $user
        ]);
    }

    public function actionLoginDetails()
    {
        // TODO: Manuchehr
    }

    public function actionChangePassword()
    {
        $uid = Yii::$app->user->id;

        if(Yii::$app->request->post()){
            $login = Html::encode(Yii::$app->request->post('username'));
            $password = Html::encode(Yii::$app->request->post('user_password'));
            $retype = Html::encode(Yii::$app->request->post('confirm_password'));
            $password = md5($password.$password);
            $retype = md5($retype.$retype);
            if($password != $retype){
                Yii::$app->session->setFlash('errorRetype', 'Пароли не совпадают!');
                return $this->redirect('/admin/user/profile');
            }elseif($password == $retype) {
                if (!empty($login)) {
                    $user = User::find()->where(['username' => $login])->asArray()->one();
                    if(!empty($user)){
                        Yii::$app->session->setFlash('errorRetype', 'Этот логин уже существует! Выберите другой логин.');
                        return $this->redirect('/admin/user/profile');
                    }
                    Yii::$app->db->createCommand('UPDATE user SET
                    username="' . $login . '", user_password="' . $password . '" WHERE user_id=' . $uid)->execute();
                    Yii::$app->session->set('username', $login);
                } else {
                    Yii::$app->db->createCommand('UPDATE user SET
                    user_password="' . $password . '" WHERE user_id=' . $uid)->execute();
                }
                Yii::$app->session->setFlash('success', 'Данные успешно сохранены!');
            }
            $this->redirect('/admin/user/profile');
        }
        $this->redirect('/admin/user/profile');
    }

    public function actionCallRequests(){

        $callRequests = CallRequest::find()
            ->select('c.status st, c.id as call_id, cs.*, DATE(cs.created_at) as d, TIME(cs.created_at) as t')
            ->from('call_request c')
            ->leftJoin('customers cs', 'c.customer_id=cs.id')
            ->orderBy('c.status DESC, cs.created_at ASC')->limit(500)->asArray()->all();

        return $this->render('call-requests', [
            'data' => $callRequests
        ]);
    }

    public function actionOrderByDraws(){

        $orders = OrderByDrawing::find()
            ->select('o.status st, o.id as order_id, o.file, cs.*, DATE(cs.created_at) as d, TIME(cs.created_at) as t')
            ->from('order_by_drawing o')
            ->leftJoin('customers cs', 'o.customer_id=cs.id')
            ->orderBy('o.status DESC, cs.created_at ASC')->limit(500)->asArray()->all();

        return $this->render('order-by-draws', [
            'orders' => $orders
        ]);
    }

    public function actionQuestions(){
        $question = AnswerQuestions::find()->where(['type' => 2])
            ->orderBy('status DESC')->limit(500)
            ->asArray()
            ->all();
        return $this->render('questions', [
            'question' => $question
        ]);
    }

    public function actionContacts(){
        $contact = Contact::find()
            ->select('c.message, c.status, cs.name, cs.phone_number, email, organization, c.created_at, c.id as contact_id')
            ->from('contact c')
            ->leftJoin('customers cs', 'c.customer_id=cs.id')
            ->orderBy('c.status DESC, c.created_at ASC')->limit(500)
            ->asArray()
            ->all();
        return $this->render('contacts', [
            'contacts' => $contact
        ]);
    }


    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
}

