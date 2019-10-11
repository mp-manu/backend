<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 07.10.2019
 * Time: 17:11
 */

namespace app\modules\admin\controllers;

use app\models\Requisites;
use app\modules\admin\models\AnswerQuestions;
use app\modules\admin\models\FrontMenu;
use app\modules\admin\models\Sections;
use app\modules\admin\models\Services;
use app\modules\admin\models\WorkProccess;
use app\modules\admin\models\WorkResults;
use yii\web\Controller;
use app\modules\admin\models\Slider;
use kartik\grid\EditableColumnAction;


class EditableController extends Controller
{
    public function actions()
    {
        return[
            'chenge-slide-access' => [
                'class' => EditableColumnAction::classname(),
                'modelClass' => Slider::className(),
            ],
            'chenge-order' => [
                'class' => EditableColumnAction::classname(),
                'modelClass' => Slider::className(),
            ],
            'work-result-status' => [
                'class' => EditableColumnAction::classname(),
                'modelClass' => WorkResults::className(),
            ],
            'work-proccess-status' => [
                'class' => EditableColumnAction::classname(),
                'modelClass' => WorkProccess::className(),
            ],
            'service-status' => [
                'class' => EditableColumnAction::classname(),
                'modelClass' => Services::className(),
            ],
            'answer-question-status' => [
                'class' => EditableColumnAction::classname(),
                'modelClass' => AnswerQuestions::className(),
            ],
            'front-menu-access' => [
                'class' => EditableColumnAction::classname(),
                'modelClass' => FrontMenu::className(),
            ],
            'requisites-status' => [
                'class' => EditableColumnAction::classname(),
                'modelClass' => Requisites::className(),
            ],
            'section-status' => [
                'class' => EditableColumnAction::classname(),
                'modelClass' => Sections::className(),
            ],

        ];
    }


}