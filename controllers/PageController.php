<?php

namespace app\controllers;

use app\models\Requisites;
use app\modules\admin\models\AnswerQuestions;
use app\modules\admin\models\PriceList;
use app\modules\admin\models\Sections;
use app\modules\admin\models\ServiceInfo;
use app\modules\admin\models\Services;
use app\modules\admin\models\WorkProccess;
use app\modules\admin\models\WorkResults;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

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

        $service = Services::find()->where(['id' => 1, 'status' => 1])->asArray()->one();
        $serviceInfo = ServiceInfo::find()->where(['service_id' => $service['id'], 'status' => 1])->limit('3')->all();
        $answerQuestions = AnswerQuestions::find()->where(['service_id' => $service['id'], 'status' => 1, 'type' => 1])->all();
        $workProccess = WorkProccess::find()->where(['service_id' => $service['id'], 'status' => 1])->all();
        $workResults = WorkResults::find()->where(['status' => 1])->all();
        $priceList = PriceList::find()->where(['service_id' => $service['id'], 'status' => 1])->all();

        return $this->render('service-cold-stamping', [
            'service' => $service,
            'serviceInfo' => $serviceInfo,
            'answerQuestions' => $answerQuestions,
            'workProccess' => $workProccess,
            'workResults' => $workResults,
            'priceList' => $priceList,
        ]);
    }

    public function actionServiceMetalBending()
    {
        $service = Services::find()->where(['id' => 2, 'status' => 1])->asArray()->one();

        $subServices = Services::find()
            ->select('s.*, si.key, si.val, si.description as desc, si.img')
            ->from('services s')
            ->join('LEFT JOIN', 'service_info si', 's.id=si.service_id')
            ->where(['parent_id' => $service['id'], 's.status' => 1])
            ->asArray()->all();

        $priceList = PriceList::find()
            ->select('p.*, s.name, s.id as sid')
            ->from('price_list p')
            ->leftJoin('services s', 'p.service_id=s.id')
            ->where(['p.type' => 2, 's.status' => 1, 'p.status' => 1])
            ->asArray()->all();

        $data = array();
        $activeServicesId = array();
        foreach ($priceList as $list){
            $activeServicesId[$list['sid']]=$list['sid'];
            $data['name'][$list['sid']] = $list['name'];
            $data['length'][$list['sid']][$list['length']] = $list['length'];
            $data['depth'][$list['sid']][$list['depth']] = $list['depth'];
            $data['price'][$list['length']][$list['depth']][$list['sid']] = $list['price'];
        }
        //debug($data);

        return $this->render('service-metal-bending', [
            'service' => $service,
            'subServices' => $subServices,
            'priceList' => $priceList,
            'activeServicesId' => $activeServicesId,
            'data' => $data
        ]);
    }


    public function actionContact()
    {
        $reqvisit = Requisites::find()->where(['status' => 1])->asArray()->one();

        return $this->render('contact', [
            'reqvisit' => $reqvisit
        ]);
    }

    public function actionAbout()
    {
        $howWeWork = Sections::getSectionsByType(2);
        $whyChooseUs = Sections::getSectionsByType(1);
        $banner = Sections::getSectionsByType(3);
        $info = Sections::getSectionsByType(4);
        $history = Sections::getSectionsByType(5);

        return $this->render('about', [
            'howWeWork' => $howWeWork,
            'whyChooseUs' => $whyChooseUs,
            'banner' => $banner,
            'info' => $info,
            'history' => $history,
        ]);
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
            if ($action->id == 'error' || $action->id == 'contact' || $action->id == 'thanks') {
                $this->layout = 'main-dark';
            }
            return true;
        }
    }
}
