<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 08.10.2019
 * Time: 21:45
 */

use app\modules\admin\models\FrontMenu;

?>

<header class="page__header is-absolute">
    <div class="header is-transparent">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo">
                    <div class="logo is-light">
                        <?php if(Yii::$app->controller->action->id != 'index'):  ?>
                        <a href="/" style="text-decoration: none"><div class="logo__label"><?= Yii::$app->settings->get('Сайт', 'имя') ?></div></a>
                        <?php else: ?>
                        <div class="logo__label"><?= Yii::$app->settings->get('Сайт', 'имя') ?></div>
                        <?php endif; ?>
                        <div class="logo__caption"><?= Yii::$app->settings->get('Сайт', 'описание') ?></div>
                    </div>
                </div>
                <div class="header__nav">
                    <header-nav inline-template>
                        <nav class="header-nav is-light">
                            <ul class="header-nav__list">
                                <?= FrontMenu::PrintToHeader() ?>
                            </ul>
                        </nav>
                    </header-nav>
                </div>
                <div class="header__phone">
                    <div class="phone is-light"><a class="phone__value" href="tel:<?= Yii::$app->settings->get('Компания', 'тел') ?>">
                            <?= Yii::$app->settings->get('Компания', 'тел') ?>
                        </a>
                    </div>
                </div>
                <div class="header__button">
                    <button class="button is-bordered is-light" data-modal="callback"><?= Yii::$app->settings->get('Текст', 'заказ_звонка') ?></button>
                </div>
            </div>
        </div>
    </div>
</header>
