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
    <h1>Login Form</h1>
</div>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <?php if(\Yii::$app->session->hasFlash('loginError')) : ?>
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
    <div class="toggle"><i class="fa fa-user-plus"></i>
    </div>
    <div class="form formLogin">
        <h2>Login to your account</h2>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => ''])->label(false) ?>
        <?= $form->field($model, 'password')->passwordInput(['class' => ''])->label(false) ?>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => '', 'name' => 'login-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="form formRegister">
        <h2>Create an account</h2>
        <form>
            <input type="text" placeholder="Username"/>
            <input type="password" placeholder="Password"/>
            <input type="email" placeholder="Email Address"/>
            <input type="text" placeholder="Full Name"/>
            <input type="tel" placeholder="Phone Number"/>
            <button>Register</button>
        </form>
    </div>
    <div class="form formReset">
        <h2>Reset your password?</h2>
        <form>
            <input type="email" placeholder="Email Address"/>
            <button>Send Verification Email</button>
        </form>
    </div>
</div>

