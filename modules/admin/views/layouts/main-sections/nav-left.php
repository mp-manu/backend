<?php
/**
 * Created by PhpStorm.
 * User: Манучехр
 * Time: 14:55
 */

use app\modules\admin\models\BackMenu;
?>
<!-- start sidebar menu -->
<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu" style="min-height: 580px">
        <div id="remove-scroll">
            <ul class="sidemenu page-header-fixed" data-keep-expanded="false"
                data-auto-scroll="true" data-slide-speed="200"
                style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="sidebar-user-panel">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?= Yii::getAlias('@web') ?>/admin_assets/img/prof/<?= Yii::$app->session->get('avatar', 'default-prof.jpg') ?>"
                                 class="img-circle user-img-circle" alt="User Image"/>
                        </div>
                        <div class="pull-left info">
                            <p><?= Yii::$app->session->get('username') ?></p>
                            <a href="#"><i class="fa fa-circle user-online"></i><span
                                        class="txtOnline"> Online</span></a>
                        </div>
                    </div>
                </li>
                <?= BackMenu::PrintToPage() ?>
            </ul>
        </div>
    </div>
</div>
<!-- end sidebar menu -->
