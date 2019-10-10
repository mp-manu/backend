<?php
/**
 * Created by PhpStorm.
 * User: IT_User-144
 * Date: 10.10.2019
 * Time: 10:08
 */

namespace app\controllers;
use app\models\CallRequest;
use app\models\Contact;
use app\models\Customers;
use app\models\OrderByDrawing;
use yii\db\Expression;
use yii\helpers\Html;
use yii\web\Controller;
use Yii;

class RequestController extends Controller
{

    public function actionOrderByDrawing(){
        if(Yii::$app->request->post() && Yii::$app->request->post('agreement') == 'on'){
            $customer = new Customers();
            $customer->name = Html::encode(Yii::$app->request->post('name'));
            $customer->phone_number = Html::encode(Yii::$app->request->post('phone_number'));
            $customer->status = 1; //1 active, 0 inactive
            $customer->created_at = (new Expression('NOW()'));

            if($customer->save()){
                $orderByDraw = new OrderByDrawing();
                $orderByDraw->customer_id = Yii::$app->db->getLastInsertID();
                $orderByDraw->status = 1;
                $orderByDraw->created_at = (new Expression('NOW()'));
                if(!empty($_FILES['file']['tmp_name'])){
                    $filePath = Yii::getAlias('@webroot').'/img/draw-orders/';
                    $uploadfile = $filePath.basename($_FILES['file']['name']);
                    move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
                    $orderByDraw->file = basename($_FILES['file']['name']);
                }
                $orderByDraw->save();
                $this->redirect('/page/thanks');
            }else{
                echo 'not save';
            }


        }else{
            $this->goHome();
        }
    }



    public function actionNeedToCall(){

        if(Yii::$app->request->post() && Yii::$app->request->post('agreement') == 'on'){

            $customer = new Customers();
            $customer->name = Html::encode(Yii::$app->request->post('name'));
            $customer->phone_number = Html::encode(Yii::$app->request->post('phone_number'));
            $customer->status = 1;
            $customer->created_at = (new Expression('NOW()'));
            if($customer->save()){
                $request = new CallRequest();
                $request->customer_id = Yii::$app->db->getLastInsertID();
                $request->status = 1; //1 active, 2 confirmed, 0-denied
                $request->created_at = (new Expression('NOW()'));
                $request->save();
                $this->redirect('/page/thanks');
            }else{
                echo 'not save';
            }
        }else{
            $this->goHome();
        }
    }

    public function actionContact(){

        if(Yii::$app->request->post() && Yii::$app->request->post('agreement') == 'on'){

            $customer = new Customers();
            $customer->name = Html::encode(Yii::$app->request->post('name'));
            $customer->phone_number = Html::encode(Yii::$app->request->post('phone_number'));
            $customer->email = Html::encode(Yii::$app->request->post('email'));
            $customer->organization = Html::encode(Yii::$app->request->post('org'));
            $customer->status = 1;
            $customer->created_at = (new Expression('NOW()'));
            if($customer->save()){
                $contact = new Contact();
                $contact->customer_id = Yii::$app->db->getLastInsertID();
                $contact->message = Html::encode(Yii::$app->request->post('message'));
                $contact->created_at = (new Expression('NOW()'));
                $contact->save();
                $this->redirect('/page/thanks');
            }else{
                echo 'not save';
            }
        }else{
            $this->goHome();
        }
    }


    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

}