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
use app\modules\admin\models\AnswerQuestions;
use yii\db\Expression;
use yii\helpers\Html;
use yii\web\Controller;
use Yii;

class RequestController extends Controller
{

    public function actionOrderByDrawing()
    {
        if (Yii::$app->request->post() && Yii::$app->request->post('agreement') == 'on') {
            $customer = new Customers();
            $customer->name = Html::encode(Yii::$app->request->post('name'));
            $customer->phone_number = Html::encode(Yii::$app->request->post('phone_number'));
            $customer->status = 1; //1 active, 0 inactive
            $customer->created_at = (new Expression('NOW()'));

            if ($customer->save()) {
                $orderByDraw = new OrderByDrawing();
                $orderByDraw->customer_id = Yii::$app->db->getLastInsertID();
                $orderByDraw->status = 1;
                $orderByDraw->created_at = (new Expression('NOW()'));
                if (!empty($_FILES['file']['tmp_name'])) {
                    $filePath = Yii::getAlias('@webroot') . '/img/draw-orders/';
                    $uploadfile = $filePath . basename($_FILES['file']['name']);
                    move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
                    $orderByDraw->file = basename($_FILES['file']['name']);
                }
                $orderByDraw->save();
//                $this->sendEmail('Заказ по чертежу', 'order-by-draw',
//                    $customer->phone_number, $customer->name);
                $this->redirect('/page/thanks');
            } else {
                echo 'not save';
            }
        } else {
            $this->goHome();
        }
    }


    public function actionNeedToCall()
    {

        if (Yii::$app->request->post() && Yii::$app->request->post('agreement') == 'on') {
            $customer = new Customers();
            $customer->name = Html::encode(Yii::$app->request->post('name'));
            $customer->phone_number = Html::encode(Yii::$app->request->post('phone_number'));
            $customer->status = 1;
            $customer->created_at = (new Expression('NOW()'));
            if ($customer->save()) {
                $request = new CallRequest();
                $request->customer_id = Yii::$app->db->getLastInsertID();
                $request->status = 1; //1 active, 2 confirmed, 0-denied
                $request->created_at = (new Expression('NOW()'));
                $request->save();
                //$this->sendEmail('Запрос на званок', 'need-call',
                //    $customer->phone_number, $customer->name, 'Пожалуйста позвоните мне. Мой номер '.$customer->phone_number);
                $this->redirect('/page/thanks');
            } else {
                echo 'not save';
            }
        } else {
            $this->goHome();
        }
    }

    public function actionContact()
    {

        if (Yii::$app->request->post() && Yii::$app->request->post('agreement') == 'on') {

            $customer = new Customers();
            $customer->name = Html::encode(Yii::$app->request->post('name'));
            $customer->phone_number = Html::encode(Yii::$app->request->post('phone_number'));
            $customer->email = Html::encode(Yii::$app->request->post('email'));
            $customer->organization = Html::encode(Yii::$app->request->post('org'));
            $customer->status = 1;
            $customer->created_at = (new Expression('NOW()'));
            if ($customer->save()) {
                $contact = new Contact();
                $contact->customer_id = Yii::$app->db->getLastInsertID();
                $contact->message = Html::encode(Yii::$app->request->post('message'));
                $contact->created_at = (new Expression('NOW()'));
                $contact->save();
                //$this->sendEmail('Запрос клиента', 'contact',
                //    $customer->phone_number, $customer->name, $contact->message);
                $this->redirect('/page/thanks');
            } else {
                echo 'not save';
            }
        } else {
            $this->goHome();
        }
    }


    public function actionQuestion()
    {
        $question = new AnswerQuestions();
        if (Yii::$app->request->post() && Yii::$app->request->post('agreement') == 'on') {
            $question->question = Html::encode(Yii::$app->request->post('comment'));
            $question->username = Html::encode(Yii::$app->request->post('name'));
            $question->phone = Html::encode(Yii::$app->request->post('phone_number'));
            $question->type = 2;
            $question->status = 1;
            $question->service_id = 1;
            if (/*$this->sendEmail('Вопрос от клиента', 'question', $question->phone, $question->username, $question->question)
                && */$question->save()) {
               return $this->redirect('/page/thanks');
            } else {
               return $this->goHome();
            }
        }
    }



    public function actionChangeCallStatus(){
        $callId = Html::encode($_POST['call_id']);
        $s = Html::encode($_POST['status']);
        switch ($s){
            case 1:
                $s = 0;
                break;
            case 0:
                $s = 2;
                break;
            case 2:
                $s = 1;
                break;
            default:
                $s = 0;
                break;
        }

        Yii::$app->db
            ->createCommand('UPDATE call_request SET status = '.$s.' WHERE id = '.$callId)->execute();
        return $s;
    }

    public function actionChangeOrderStatus(){
        $orderId = Html::encode($_POST['order_id']);
        $s = Html::encode($_POST['status']);
        switch ($s){
            case 1:
                $s = 0;
                break;
            case 0:
                $s = 2;
                break;
            case 2:
                $s = 1;
                break;
            default:
                $s = 0;
                break;
        }

        Yii::$app->db
            ->createCommand('UPDATE order_by_drawing SET status = '.$s.' WHERE id = '.$orderId)->execute();
        return $s;
    }

    public function actionChangeContactStatus(){
        $contactId = Html::encode($_POST['contact_id']);
        $s = Html::encode($_POST['status']);
        switch ($s){
            case 1:
                $s = 0;
                break;
            case 0:
                $s = 2;
                break;
            case 2:
                $s = 1;
                break;
            default:
                $s = 0;
                break;
        }

        Yii::$app->db
            ->createCommand('UPDATE contact SET status = '.$s.' WHERE id = '.$contactId)->execute();
        return $s;
    }

    public function actionChangeQuestionStatus(){
        $questionId = Html::encode($_POST['question_id']);
        $s = Html::encode($_POST['status']);
        $text = Html::encode($_POST['answer']);
        switch ($s){
            case 1:
                $s = 0;
                break;
            case 0:
                $s = 2;
                break;
            case 2:
                $s = 1;
                break;
            default:
                $s = 0;
                break;
        }

        Yii::$app->db
            ->createCommand('UPDATE answer_questions SET status = '.$s.', answer = "'.$text.'" WHERE id = '.$questionId)->execute();
        return $s;
    }


    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function sendEmail($subject=null, $message_type=null, $phone, $customer=null, $text=null)
    {
        Yii::$app->mailer->compose('content', [
            'message_type' => $message_type,
            'phone' => $phone,
            'customer' => $customer,
            'text' => $text,
        ])
            ->setFrom([Yii::$app->params['adminEmail'] => $customer.' - '.$phone])
            ->setTo(Yii::$app->params['adminEmail'])
            ->setSubject($subject)
            ->setTextBody($customer)
            ->send();

        return true;
    }
}
