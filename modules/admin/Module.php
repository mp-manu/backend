<?php

namespace app\modules\admin;
use Yii;
use yii\filters\AccessControl;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';


    public $layout = 'main';

    public $defaultRoute = 'main/login';

    public function init()
    {
        parent::init();

        Yii::$app->errorHandler->errorAction = '/admin/main/login';
        Yii::$app->user->loginUrl = '/admin/main/login';

    }

}
