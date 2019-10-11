<?php
/**
 * Created by PhpStorm.
 * User: IT_User-144
 * Date: 11.10.2019
 * Time: 9:52
 */

use yii\helpers\Html;

echo 'Привет';



echo Html::a(' Для смены пароля перейдите по этой ссылке.',
    Yii::$app->urlManager->createAbsoluteUrl(
        [
            'site/reset-password',
            'key'=>$user->secret_key
        ]
    ));