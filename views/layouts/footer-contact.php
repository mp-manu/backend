<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 08.10.2019
 * Time: 19:18
 */

?>
<div class="content__section is-dark">
    <section class="section">
        <div class="container">
            <div class="section__body">
                <div class="section__subsection">
                    <section class="subsection">
                        <div class="grid is-row">
                            <div class="col-6">
                                <header class="subsection__header">
                                    <h3 class="subsection__title">
                                        <?= Yii::$app->settings->get('Текст', 'Контакты') ?>
                                    </h3>
                                </header>
                                <div class="subsection__body">
                                    <div class="contacts">
                                        <div class="grid is-row">
                                            <div class="col-6">
                                                <div class="contacts__person">
                                                    <article class="person">
                                                        <figure class="person__cover">
                                                            <img class="person__image" src="<?= Yii::getAlias('@web') ?>/uploads/<?= Yii::$app->images->get('Главная', 'руков_цеха') ?>"
                                                                    alt="<?= Yii::$app->settings->get('Сотрудник', 'руков_цеха_штамп') ?>">
                                                        </figure>
                                                        <header class="person__header">
                                                            <h4 class="person__name">
                                                               <?= Yii::$app->settings->get('Сотрудник', 'руков_цеха_штамп') ?>
                                                            </h4>
                                                            <p class="person__position">
                                                               <?= Yii::$app->settings->get('Сотрудник', 'главТехник') ?>
                                                            </p>
                                                        </header>
                                                    </article>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <ul class="contacts__list">
                                                    <li class="contacts__item">
                                                        <div class="contact">
                                                            <div class="contact__caption">
                                                                Телефон
                                                            </div>
                                                            <a class="contact__value"
                                                               href="tel:<?= Yii::$app->settings->get('Контакты', 'Телефон') ?>">
                                                               <?= Yii::$app->settings->get('Контакты', 'Телефон') ?>
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li class="contacts__item">
                                                        <div class="contact">
                                                            <div class="contact__caption">
                                                                Адрес
                                                            </div>
                                                            <div class="contact__value">
                                                               <?= Yii::$app->settings->get('Контакты', 'адресс') ?>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="contacts__item">
                                                        <div class="contact">
                                                            <div class="contact__caption">
                                                                Email
                                                            </div>
                                                            <a class="contact__value"
                                                               href="mailto:<?= Yii::$app->settings->get('Контакты', 'Email') ?>">
                                                               <?= Yii::$app->settings->get('Контакты', 'Email') ?>
                                                            </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="subsection__aside">
                                    <div class="subsection__form">
                                        <callback-form inline-template>
                                            <validation-observer ref="observer">
                                                <form class="callback-form form"
                                                      action="/request/need-to-call" method="post" @submit="onsubmit">
                                                    <header class="form__header">
                                                        <h3 class="form__title title">
                                                        <?= Yii::$app->settings->get('Текст', 'заказать_звонок') ?>
                                                        </h3>
                                                    </header>
                                                    <div class="form__body">
                                                        <div class="grid is-columns">
                                                            <div class="col-6">
                                                                <div class="form__control">
                                                                    <div class="form__field">
                                                                        <v-input inline-template
                                                                                 :field-name="'name'"
                                                                                 :visible-errors="[]">
                                                                            <validation-provider
                                                                                    class="v-input"
                                                                                    :class="{ &quot;is-active&quot;: active, &quot;is-ready&quot;: ready }"
                                                                                    ref="provider"
                                                                                    v-slot="{ errors }">
                                                                                <label class="v-input__label"><span
                                                                                            class="v-input__placeholder">Ваше имя</span><input
                                                                                            class="v-input__field"
                                                                                            name="name"
                                                                                            v-model="value"
                                                                                            @focus="handler(&quot;focus&quot;)"
                                                                                            @blur="handler(&quot;blur&quot;)"><span
                                                                                            class="v-input__errors"
                                                                                            v-if="errors.length &gt; 0"><span
                                                                                                class="v-input__error"
                                                                                                v-for="error in errors">{{ error }}</span></span></label>
                                                                            </validation-provider>
                                                                        </v-input>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form__control">
                                                                    <div class="form__field">
                                                                        <v-input inline-template
                                                                                 :field-name="'phone_number'"
                                                                                 :visible-errors="[]">
                                                                            <validation-provider
                                                                                    class="v-input"
                                                                                    rules="required|phone"
                                                                                    :class="{ &quot;is-active&quot;: active, &quot;is-ready&quot;: ready }"
                                                                                    ref="provider"
                                                                                    v-slot="{ errors }">
                                                                                <label class="v-input__label"><span
                                                                                            class="v-input__placeholder">Номер телефона</span><input
                                                                                            class="v-input__field"
                                                                                            name="phone_number"
                                                                                            v-model="value"
                                                                                            v-mask="&quot;+7 (###) ### ## ##&quot;"
                                                                                            @focus="handler(&quot;focus&quot;)"
                                                                                            @blur="handler(&quot;blur&quot;)"><span
                                                                                            class="v-input__errors"
                                                                                            v-if="errors.length &gt; 0"><span
                                                                                                class="v-input__error"
                                                                                                v-for="error in errors">{{ error }}</span></span></label>
                                                                            </validation-provider>
                                                                        </v-input>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <footer class="form__footer">
                                                        <div class="form__agreement">
                                                            <label class="checkbox">
                                                                <input class="checkbox__input"
                                                                        type="checkbox" name="agreement"
                                                                        required>
                                                                <span class="checkbox__label"><?= Yii::$app->settings->get('Сайт', 'заказывая_звонок') ?>
                                                                    <a href="/page/privacy-policy">персональных данных</a>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form__button">
                                                            <button class="button is-wide is-large">
                                                                <?= Yii::$app->settings->get('Сайт', 'call_me') ?>
                                                            </button>
                                                        </div>
                                                    </footer>
                                                </form>
                                            </validation-observer>
                                        </callback-form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>
