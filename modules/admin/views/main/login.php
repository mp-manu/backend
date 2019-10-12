<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-title">
    <h1><?= Yii::$app->settings->get('Сайт', 'Имя компании') ?></h1>
</div>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <?php if (\Yii::$app->session->hasFlash('loginError')) : ?>
            <div class="alert alert-danger alert-dismissible" style="margin-top: 5%;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <?php echo \Yii::$app->session->getFlash('loginError'); ?>
            </div>
        <?php endif; ?>
    </div>
</div>


<!-- Login Form-->
<div class="login-form text-center">
    <div></div>

    <div class="form formLogin">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => '', 'placeholder' => 'Логин'])->label(false) ?>
        <?= $form->field($model, 'password')->passwordInput(['class' => '', 'placeholder' => 'Пароль'])->label(false) ?>
        <!--        --><? //= $form->field($model, 'rememberMe')->checkbox() ?>
        <div class="form-group">
            <?= Html::submitButton('Вход', ['class' => '', 'name' => 'login-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <a href="/" class="btn btn-link">Перейти на главную страницу</a>
</div>
