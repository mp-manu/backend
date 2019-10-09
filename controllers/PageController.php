<?php

namespace app\controllers;

use app\modules\admin\models\AnswerQuestions;
use app\modules\admin\models\ServiceInfo;
use app\modules\admin\models\Services;
use app\modules\admin\models\WorkProccess;
use app\modules\admin\models\WorkResults;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class PageController extends Controller
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
                'actions' => [
                    'logout' => ['post'],
                ],
            ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionServiceColdStamping()
    {
        $questionModel = new AnswerQuestions();

        $service = Services::find()->where(['id' => 1, 'status' => 1])->asArray()->one();
        $serviceInfo = ServiceInfo::find()->where(['service_id' => $service['id'], 'status' => 1])->all();
        $answerQuestions = AnswerQuestions::find()->where(['service_id' => $service['id'], 'status' => 1, 'type' => 1])->all();
        $workProccess = WorkProccess::find()->where(['service_id' => $service['id'], 'status' => 1])->all();
        $workResults = WorkResults::find()->where(['status' => 1])->all();



        return $this->render('service-cold-stamping', [
            'service' => $service,
            'serviceInfo' => $serviceInfo,
            'answerQuestions' => $answerQuestions,
            'workProccess' => $workProccess,
            'workResults' => $workResults,
            'questionModel' => $questionModel,
        ]);
    }

    public function actionServiceMetalBending()
    {

        return $this->render('service-metal-bending');
    }


    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }


    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionThanks()
    {
        return $this->render('thanks');
    }


    public function actionError()
    {

        return $this->render('error');
    }


    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if ($action->id == 'error' || $action->id == 'contact') {
                $this->layout = 'main-dark';
            }
            return true;
        }
    }
}
