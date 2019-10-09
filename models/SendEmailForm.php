<?php

namespace app\models;

use Yii;
use yii\base\Model;



class SendEmailForm extends Model{

	public $email;

	public function rules(){

		return [
			['email', 'filter', 'filter' => 'trim'],
			['email', 'required'],
			['email', 'email'],
			['email', 'exist',
					   'targetClass' => User::className(),
					   'filter' => [
					   	'is_block' => User::STATUS_ACTIVE
					   ],
					   'message'=> Yii::t('app', 'Incorrect email or unregistered email!')
					],
			];
	}

	public function attributeLabels(){

		return[

			'email' => Yii::t('app', 'Email')
		];
	}

	public function sendMail(){

		$user = User::findOne(
			[
				'is_block' => User::STATUS_ACTIVE,
				'email' => $this->email
			]
		);

		if($user):
			$user->generateSecretKey();

			if($user->save()):
				return Yii::$app->mailer->compose('resetPassword', ['user' => $user])
				->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name.' (отправлено роботом)!'])
				->setTo($this->email)
				->setSubject('Сброс пароля для '.Yii::$app->name)
				->send();
			endif;
		endif;

	return false;
	}



}
