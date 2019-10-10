<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 08.10.2019
 * Time: 21:45
 */

use app\modules\admin\models\FrontMenu;

?>

<header class="page__header">
    <div class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo"><a class="logo" href="/" title="Главная страница">
                        <div class="logo__label"><i>Тех</i>Арсенал</div>
                        <div class="logo__caption">Современный подход<br>к&nbsp;холодной штамповке</div>
                    </a></div>
                <div class="header__nav">
                    <header-nav inline-template>
                        <nav class="header-nav">
                            <ul class="header-nav__list">
                                <?= FrontMenu::PrintToHeader() ?>
                            </ul>
                        </nav>
                    </header-nav>
                </div>
                <div class="header__phone">
                    <div class="phone"><a class="phone__value" href="tel:+7 (952) 687-58-04">+7 (952)
                            687-58-04</a></div>
                </div>
                <div class="header__button">
                    <button class="button is-bordered " data-modal="callback">Заказать звонок</button>
                </div>
            </div>
        </div>
    </div>
</header>