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
                        <div class="logo__label"><?= Yii::$app->settings->get('Сайт', 'имя') ?></div>
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
                    <button class="button is-bordered is-light" data-modal="callback">Заказать звонок</button>
                </div>
            </div>
        </div>
    </div>
</header>
