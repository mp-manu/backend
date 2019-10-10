<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 08.10.2019
 * Time: 0:18
 */
$this->title = 'Контакты';
?>

<div class="content__headline">
    <header class="headline has-padding">
        <div class="container">
            <div class="grid is-row">
                <div class="col-7">
                    <div class="headline__body">
                        <div class="headline__breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb__item"><a class="breadcrumb__link"
                                                                href="/" title="Главная">Главная</a>
                                </li>
                            </ul>
                        </div>
                        <h1 class="headline__title title">Контакты</h1></div>
                </div>
            </div>
        </div>
    </header>
</div>
<div class="content__body">
    <div class="content__contacts">
        <section class="section">
            <div class="container">
                <div class="section__body">
                    <div class="contact-cart">
                        <div class="grid is-row">
                            <div class="col-6 is-middle">
                                <div class="contact-cart__body">
                                    <div class="contact-cart__contacts">
                                        <div class="contacts">
                                            <div class="grid is-row is-middle">
                                                <div class="col-6">
                                                    <div class="contacts__person">
                                                        <article class="person">
                                                            <figure class="person__cover"><img
                                                                        class="person__image"
                                                                        src="/img/person.jpg"
                                                                        alt="Дмитрий Соляник"></figure>
                                                            <header class="person__header"><h4
                                                                        class="person__name">Дмитрий
                                                                    Соляник</h4>
                                                                <p class="person__position">Главный
                                                                    техник</p></header>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <ul class="contacts__list">
                                                        <li class="contacts__item">
                                                            <div class="contact">
                                                                <div class="contact__caption">Телефон
                                                                </div>
                                                                <a class="contact__value"
                                                                   href="tel:+7 (910) 788-40-41">+7
                                                                    (910) 788-40-41</a></div>
                                                        </li>
                                                        <li class="contacts__item">
                                                            <div class="contact">
                                                                <div class="contact__caption">Адрес
                                                                </div>
                                                                <div class="contact__value">Смоленск,
                                                                    дер. Тепличный Комбинат №1
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="contacts__item">
                                                            <div class="contact">
                                                                <div class="contact__caption">Email
                                                                </div>
                                                                <a class="contact__value"
                                                                   href="mailto:andrey@prometey67.ru">andrey@prometey67.ru</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="contact-cart__aside">
                                    <div class="contact-cart__map">
                                        <contact-map inline-template>
                                            <div class="contact-map"
                                                 :class="{ &quot;is-ready&quot;: ready }">
                                                <div class="contact-map__container" ref="container"
                                                     data-initial="{&quot;center&quot;:[54.76947905613925,32.11584049999999],&quot;zoom&quot;:16,&quot;markers&quot;:[{&quot;address&quot;:&quot;Смоленск, дер. Тепличный Комбинат №1&quot;,&quot;coords&quot;:[54.76947905613925,32.11584049999999],&quot;image&quot;:{&quot;href&quot;:&quot;/img/marker.svg&quot;,&quot;size&quot;:[65,54],&quot;offset&quot;:[-19,-54]}}]}"></div>
                                            </div>
                                        </contact-map>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="content__section is-pb110">
        <section class="section">
            <div class="container">
                <div class="section__body">
                    <div class="section__subsection">
                        <section class="subsection">
                            <div class="grid is-row">
                                <div class="col-6">
                                    <header class="subsection__header"><h3 class="subsection__title">
                                            Реквизиты</h3></header>
                                    <div class="subsection__body">
                                        <dl class="datalist">
                                            <div class="datalist__row">
                                                <dt class="datalist__key">Юридический адрес</dt>
                                                <dd class="datalist__value">Смоленск, дер. Тепличный
                                                    Комбинат №1
                                                </dd>
                                            </div>
                                            <div class="datalist__row">
                                                <dt class="datalist__key">Почтовый адрес</dt>
                                                <dd class="datalist__value">Смоленск, дер. Тепличный
                                                    Комбинат №1
                                                </dd>
                                            </div>
                                            <div class="datalist__row">
                                                <dt class="datalist__key">ИНН</dt>
                                                <dd class="datalist__value">7712345678</dd>
                                            </div>
                                            <div class="datalist__row">
                                                <dt class="datalist__key">КПП</dt>
                                                <dd class="datalist__value">779101001</dd>
                                            </div>
                                            <div class="datalist__row">
                                                <dt class="datalist__key">Р/С</dt>
                                                <dd class="datalist__value">40702810123450101230</dd>
                                            </div>
                                            <div class="datalist__row">
                                                <dt class="datalist__key">К/С</dt>
                                                <dd class="datalist__value">30101234500000000225</dd>
                                            </div>
                                            <div class="datalist__row">
                                                <dt class="datalist__key">ОКПО</dt>
                                                <dd class="datalist__value">7712345678</dd>
                                            </div>
                                            <div class="datalist__row">
                                                <dt class="datalist__key">КПП</dt>
                                                <dd class="datalist__value">779101001</dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="subsection__aside">
                                        <div class="subsection__form">
                                            <feedback-form inline-template>
                                                <validation-observer ref="observer">
                                                    <form class="feedback-form form is-bordered"
                                                          action="/request/contact" method="post" @submit="onsubmit">
                                                        <header class="form__header">
                                                            <h3 class="form__title title is-big">
                                                                По любым вопросам
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
                                                                <div class="col-6">
                                                                    <div class="form__control">
                                                                        <div class="form__field">
                                                                            <v-input inline-template
                                                                                     :field-name="'email'"
                                                                                     :visible-errors="[]">
                                                                                <validation-provider
                                                                                        class="v-input"
                                                                                        rules="email"
                                                                                        :class="{ &quot;is-active&quot;: active, &quot;is-ready&quot;: ready }"
                                                                                        ref="provider"
                                                                                        v-slot="{ errors }">
                                                                                    <label class="v-input__label"><span
                                                                                                class="v-input__placeholder">Ваш Email</span><input
                                                                                                class="v-input__field"
                                                                                                name="email"
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
                                                                                     :field-name="'org'"
                                                                                     :visible-errors="[]">
                                                                                <validation-provider
                                                                                        class="v-input"
                                                                                        :class="{ &quot;is-active&quot;: active, &quot;is-ready&quot;: ready }"
                                                                                        ref="provider"
                                                                                        v-slot="{ errors }">
                                                                                    <label class="v-input__label"><span
                                                                                                class="v-input__placeholder">Название организации</span><input
                                                                                                class="v-input__field"
                                                                                                name="org"
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
                                                                <div class="col-12">
                                                                    <div class="form__control">
                                                                        <div class="form__field">
                                                                            <v-textarea inline-template
                                                                                        :field-name="'message'"
                                                                                        :visible-errors="[]">
                                                                                <validation-provider
                                                                                        class="v-textarea"
                                                                                        rules="required"
                                                                                        ref="provider"
                                                                                        :class="{ &quot;is-active&quot;: active, &quot;is-ready&quot;: ready }"
                                                                                        v-slot="{ errors }">
                                                                                    <label class="v-textarea__label"><span
                                                                                                class="v-textarea__placeholder">Ваше сообщение</span><textarea
                                                                                                class="v-textarea__field"
                                                                                                name="message"
                                                                                                v-model="value"
                                                                                                @focus="handler(&quot;focus&quot;)"
                                                                                                @blur="handler(&quot;blur&quot;)"></textarea><span
                                                                                                class="v-textarea__errors"
                                                                                                v-if="errors.length &gt; 0"><span
                                                                                                    class="v-textarea__error"
                                                                                                    v-for="error in errors">{{ error }}</span></span></label>
                                                                                </validation-provider>
                                                                            </v-textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <footer class="form__footer">
                                                            <div class="form__agreement"><label
                                                                        class="checkbox"><input
                                                                            class="checkbox__input"
                                                                            type="checkbox" name="agreement"
                                                                            required><span
                                                                            class="checkbox__label">Заказывая обратный звонок, даю согласие на обработку <a
                                                                                href="/policy.html">персональных данных</a></span></label>
                                                            </div>
                                                            <div class="form__button">
                                                                <button class="button is-wide is-large">
                                                                    Отправить сообщение
                                                                </button>
                                                            </div>
                                                        </footer>
                                                    </form>
                                                </validation-observer>
                                            </feedback-form>
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
</div>
