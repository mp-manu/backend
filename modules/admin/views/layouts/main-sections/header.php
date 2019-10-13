<?php
/**
 * Created by PhpStorm.
 * User: Манучехр
 * Date: 27.06.2019
 * Time: 14:55
 */

use app\models\CallRequest;
use app\models\Contact;

$contacts = Contact::find()->select('c.*, cs.*, time(c.created_at) as created_at')
    ->from('contact c')
    ->leftJoin('customers cs', 'c.customer_id=cs.id')
    ->where(['c.status' => 1])->asArray()->all();
$calls = Contact::find()->select('c.*, cs.*, time(cs.created_at) as created_at')
    ->from('call_request c')
    ->innerJoin('customers cs', 'c.customer_id=cs.id')
    ->where(['c.status' => 1])->asArray()->all();
?>

<!-- start header -->
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <!-- logo start -->
        <div class="page-logo">
            <a href="/">
                <span class="logo-icon material-icons fa-rotate-20">star</span>
                <span class="logo-default">ТехАрсенал</span> </a>
        </div>
        <!-- logo end -->
        <ul class="nav navbar-nav navbar-left in">
            <li><a href="#" class="menu-toggler sidebar-toggler"><i
                            class="icon-menu"></i></a>
            </li>
        </ul>
        <!-- start mobile menu -->
        <a href="javascript:;" class="menu-toggler responsive-toggler"
           data-toggle="collapse"
           data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- end mobile menu -->
        <!-- start header menu -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li><a href="javascript:;" class="fullscreen-btn"><i
                                class="fa fa-arrows-alt"></i></a></li>
                <!-- end language menu -->
                <!-- start notification dropdown -->
                <li class="dropdown dropdown-extended dropdown-notification"
                    id="header_notification_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"
                       data-hover="dropdown" data-close-others="true">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge headerBadgeColor1"> <?= count($calls) ?> </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3><span class="bold">Запросы на звонок</span></h3>
                            <span class="notification-label purple-bgcolor">Новые <?=  count($calls) ?> </span>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list small-slimscroll-style"
                                data-handle-color="#637283">
                                <?php foreach ($calls as $call): ?>
                                <li>
                                    <a href="/admin/user/calls?uid="<?=$call['customer_id']?>>
                                        <span class="time"><?= $call['created_at'] ?></span>
                                        <span class="details">
                                                <span class="notification-icon circle blue-bgcolor"><i
                                                            class="fa fa-phone"></i></span>
                                                <b><?= $call['name'] ?> </b> <?= substr($call['phone_number'], 0, 15).'...' ?> </span>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="dropdown-menu-footer">
                                <a href="/admin/user/messages"> Все оповищение </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- end notification dropdown -->
                <!-- start message dropdown -->
                <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"
                       data-hover="dropdown" data-close-others="true">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge headerBadgeColor2"> <?=  count($contacts) ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3><span class="bold">Сообщение</span></h3>
                            <span class="notification-label cyan-bgcolor">Новые <?=  count($contacts) ?></span>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list small-slimscroll-style"
                                data-handle-color="#637283">
                                <?php foreach ($contacts as $contact): ?>
                                <li>
                                    <a href="#">
                                        <span class="subject">
                                                	<span class="from"> <?=$contact['name'].' - '.$contact['phone_number']?> </span>
                                                	<span class="time"><?=$contact['created_at']?> </span>
                                                </span>
                                        <span class="message"> <?= substr($contact['message'], 0, 20).'...' ?> </span>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="dropdown-menu-footer">
                                <a href="#"> Все сообщение </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- end message dropdown -->
                <!-- start manage user dropdown -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"
                       data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="<?= Yii::getAlias('@web') ?>/admin_assets/img/prof/<?= Yii::$app->session->get('avatar', 'default-prof.jpg') ?>"/>
                        <span class="username username-hide-on-mobile"> <?= Yii::$app->session->get('username')?> </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="/admin/user/profile">
                                <i class="icon-user"></i> Профиль </a>
                        </li>
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                <i class="icon-directions"></i> Help-->
<!--                            </a>-->
<!--                        </li>-->
                        <li class="divider"></li>
<!--                        <li>-->
<!--                            <a href="lock_screen.html">-->
<!--                                <i class="icon-lock"></i> Lock-->
<!--                            </a>-->
<!--                        </li>-->
                        <li>
                            <a href="/admin/main/logout">
                                <i class="icon-logout"></i> Выход </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- end header -->
