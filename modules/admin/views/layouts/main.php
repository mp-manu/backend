<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\admin\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:title" content="">
        <meta property="og:description" content="">
        <meta property="og:site_name" content="Главная">
        <meta property="og:locale" content="ru_RU">
       <?= Yii::$app->settings->getMetaTags(); ?>
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <!-- favicon -->
        <link rel="shortcut icon" href="/favicon.ico"/>
        <?php $this->head() ?>
    </head>
    <!-- END HEAD -->
    <body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-red">
    <?php $this->beginBody() ?>
    <div class="page-wrapper">

        <?= $this->render('main-sections/header.php') ?>
        <?//= $this->render('main-sections/themes.php') ?>

        <!-- start page container -->
        <div class="page-container">
            <?= $this->render('main-sections/nav-left.php') ?>

            <!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content" >
                    <?= $content ?>
                </div>
            </div>
        </div>

    <!-- end page container -->
    <!-- start footer -->
    <div class="page-footer">
        <div class="page-footer-inner">© <?= date('Y') ?> <?= Yii::$app->settings->get('Сайт', 'Имя компании') ?>
            <a href="https://dancecolor.ru" target="_top" class="makerCss">DANCECOLOR</a>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- end footer -->
    </div>

    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>