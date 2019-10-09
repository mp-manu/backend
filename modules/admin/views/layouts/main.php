<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\admin\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta name="description" content="Responsive Admin Template"/>
        <meta name="author" content="SmartUniversity"/>
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <!-- favicon -->
        <link rel="shortcut icon"
              href="/favicon.ico"/>
        <?php $this->head() ?>
    </head>
    <!-- END HEAD -->
    <body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-red sidemenu-closed">
    <?php $this->beginBody() ?>
    <div class="page-wrapper">

        <?= $this->render('main-sections/header.php') ?>
        <?= $this->render('main-sections/themes.php') ?>

        <!-- start page container -->
        <div class="page-container">
            <?= $this->render('main-sections/nav-left.php') ?>

            <!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <?= $content ?>
                </div>
            </div>
        </div>
    </div>
    <!-- end chat sidebar -->

    <!-- end page container -->
    <!-- start footer -->
    <div class="page-footer">
        <div class="page-footer-inner">© <?= date('Y') ?> ООО ТехАрсенал, Смоленск
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