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

class UserController extends Controller
{

    public function actionRegister(){


        // TODO: Manuchehr
        return $this->redirect('/admin/main/login');
    }

    public function actionProfile(){


        // TODO: Manuchehr
        return $this->redirect('/admin/main/login');
    }

    public function actionLoginDetails(){
            // TODO: Manuchehr
    }

    public function actionChangePassword()
    {
        return parent::actions(); // TODO: Manuchehr
    }

}