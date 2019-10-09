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
use yii\web\Controller;
use app\models\User;
use app\models\LoginForm;
use app\models\LoginDetails;

class MainController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
            ],
        ];
    }

    public function actionLogin()
    {
        $this->layout = 'main-login';
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect('/admin/main/index');
        }
        $model = new LoginForm();
        $login = new LoginDetails();
        if ($model->load(Yii::$app->request->post())) {
            $log = User::find()->where(['username' => $_POST['LoginForm']['username'], 'is_block' => 0])->one();
            if(empty($log)) {
                \Yii::$app->session->setFlash('loginError', '<i class="fa fa-warning"></i><b> '.
                    Yii::t('app','Incorrect username or password!').'</b>');
                return $this->render('login', ['model' => $model]);
            }
            $login->login_user_id = $log['user_id'];
            $loginuser = $login->login_user_id;
            if($loginuser){
                \Yii::$app->session->set('user_id',$loginuser);
            }else{
                \Yii::$app->session->setFlash('loginError', '<i class="fa fa-warning"></i><b> '.
                    Yii::t('app','These Login credentials are Blocked/Deactive by Admin').'</b>');
                return $this->render('login', ['model' => $model,]);
            }

            $login->login_status = 1;
            $login->login_at = new Expression('NOW()');
            $login->user_ip_address=$_SERVER['REMOTE_ADDR'];

            if($model->login()) {
                $login->save(false);
                $auth_user = User::findIdentity($login->login_user_id);
                $auth_user->session_id = \Yii::$app->session->getId();
                $auth_user->save(false);

                \Yii::$app->session->set('username',$log['username']);
                \Yii::$app->session->set('email',$log['email']);
                \Yii::$app->session->set('user_type',$log['user_type']);
                \Yii::$app->session->set('avatar',$log['avatar']);

                return $this->redirect('/admin/main/index');
            } else{
                return $this->render('login', ['model' => $model,]);
            }
        } else{
            return $this->render('login', ['model' => $model,]);
        }
    }


    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionLogout(){

        Yii::$app->user->logout();

        return $this->redirect('/admin/main/login');
    }


}