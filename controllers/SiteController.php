<?php

namespace app\controllers;

use app\modules\admin\models\FrontMenu;
use app\modules\admin\models\Sections;
use app\modules\admin\models\Services;
use app\modules\admin\models\Slider;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //$frontMenu = FrontMenu::find()->where(['nodeaccess' => 1])->asArray()->all();
        $slider = Slider::getSliders();
        $otherServices = Services::getRandomServices();
        $howWeWork = Sections::getSectionsByType(2);
        $whyChooseUs = Sections::getSectionsByType(1);
        //debug($otherServices);
        return $this->render('index', [
            'slider' => $slider,
            'otherServices' => $otherServices,
            'howWeWork' => $howWeWork,
            'whyChooseUs' => $whyChooseUs,
        ]);
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
