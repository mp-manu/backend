<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 08.10.2019
 * Time: 19:09
 */

$this->title = 'Холодная штамповка';

echo $this->render('/page/banners/service-cold-stamping', ['service' => $service]);
?>

<div class="content__body">
    <div class="content__section is-pb110">
        <section class="section">
            <div class="container">
                <div class="section__body">
                    <div class="options">
                        <ul class="options__list grid is-row">
                            <li class="options__item col-4">
                                <article class="option">
                                    <header class="option__header"><img class="option__icon"
                                                                        src="<?= Yii::getAlias('@web') ?>/img/option-1.svg" alt>
                                        <h3 class="option__title">Преимущества способа</h3></header>
                                    <div class="option__body">
                                        <ul class="option__list">
                                            <li class="option__item">Штамповка - самый недорогой способ
                                                получить множество деталей на 100% соответсвующих
                                                чертежу
                                            </li>
                                            <li class="option__item">Долговечность изделий</li>
                                            <li class="option__item">Высокая скорость, большие объемы
                                            </li>
                                        </ul>
                                    </div>
                                </article>
                            </li>
                            <li class="options__item col-4">
                                <article class="option">
                                    <header class="option__header"><img class="option__icon"
                                                                        src="<?= Yii::getAlias('@web') ?>/img/option-2.svg" alt>
                                        <h3 class="option__title">Когда вам нужна штамповка</h3>
                                    </header>
                                    <div class="option__body">
                                        <ul class="option__list">
                                            <li class="option__item">Нужно быстро сделать много деталей
                                                по чертежам
                                            </li>
                                            <li class="option__item">У вас есть чертежи</li>
                                            <li class="option__item">Толщина детали в широкой части не
                                                более 5 мм
                                            </li>
                                            <li class="option__item">Вам нужны детали сложных форм с
                                                высокой точностью размеров
                                            </li>
                                        </ul>
                                    </div>
                                </article>
                            </li>
                            <li class="options__item col-4">
                                <article class="option">
                                    <header class="option__header"><img class="option__icon"
                                                                        src="<?= Yii::getAlias('@web') ?>/img/option-3.svg" alt>
                                        <h3 class="option__title">Наше оборудование</h3></header>
                                    <div class="option__body">
                                        <ul class="option__list">
                                            <li class="option__item">Пресса кривошипные с усилием от 6
                                                до 100 тонн
                                            </li>
                                            <li class="option__item">Пресс ножницы комбинированные</li>
                                            <li class="option__item">Ножницы гильотинные до 12 мм</li>
                                        </ul>
                                    </div>
                                </article>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="content__section is-grey is-p100">
        <section class="section">
            <div class="container">
                <div class="section__body">
                    <div class="grid is-row">
                        <div class="col-11">
                            <div class="section__subsection">
                                <section class="subsection">
                                    <header class="subsection__header"><h3 class="subsection__title">
                                            Вопрос ответ</h3></header>
                                    <div class="subsection__body">
                                        <div class="subsection__accordion">
                                            <div class="accordion">
                                                <ul class="accordion__list">
                                                    <li class="accordion__item">
                                                        <accordion-item inline-template :initial="true">
                                                            <div class="accordion-item"
                                                                 :class="{ &quot;is-open&quot;: opened }">
                                                                <div class="accordion-item__header"
                                                                     tabindex="0" data-index="1"
                                                                     @click="toggle"
                                                                     @keypress.enter.space="toggle">
                                                                    <div class="accordion-item__heading">
                                                                        <h3 class="accordion-item__title">
                                                                            От чего зависит финальная
                                                                            стоимость изделия?</h3>
                                                                    </div>
                                                                    <svg class="accordion-item__arrow">
                                                                        <use xlink:href="/img/sprite.svg#arrow"></use>
                                                                    </svg>
                                                                </div>
                                                                <transition name="fade">
                                                                    <div class="accordion-item__body"
                                                                         v-if="opened">
                                                                        <div class="accordion-item__text text">
                                                                            <p>С самого начала выверяем
                                                                                всё с максимальной
                                                                                точностью. Чем точнее
                                                                                первый этап, тем меньше
                                                                                в дальнейшем будет
                                                                                трудностей. Оснастку мы
                                                                                изготавливаем сперва на
                                                                                станке, а затем доводим
                                                                                вручную, пока она не
                                                                                будет на 100%
                                                                                соответствовать чертежу.
                                                                                Мы не начинаем
                                                                                штамповку, пока она не
                                                                                достигнет максимально
                                                                                точных размеров. Иначе у
                                                                                нас не бывает.</p></div>
                                                                    </div>
                                                                </transition>
                                                            </div>
                                                        </accordion-item>
                                                    </li>
                                                    <li class="accordion__item">
                                                        <accordion-item inline-template
                                                                        :initial="false">
                                                            <div class="accordion-item"
                                                                 :class="{ &quot;is-open&quot;: opened }">
                                                                <div class="accordion-item__header"
                                                                     tabindex="0" data-index="2"
                                                                     @click="toggle"
                                                                     @keypress.enter.space="toggle">
                                                                    <div class="accordion-item__heading">
                                                                        <h3 class="accordion-item__title">
                                                                            Я из другого города.
                                                                            Возможно ли сделать
                                                                            заказ?</h3></div>
                                                                    <svg class="accordion-item__arrow">
                                                                        <use xlink:href="/img/sprite.svg#arrow"></use>
                                                                    </svg>
                                                                </div>
                                                                <transition name="fade">
                                                                    <div class="accordion-item__body"
                                                                         v-if="opened">
                                                                        <div class="accordion-item__text text">
                                                                            <p>С самого начала выверяем
                                                                                всё с максимальной
                                                                                точностью. Чем точнее
                                                                                первый этап, тем меньше
                                                                                в дальнейшем будет
                                                                                трудностей. Оснастку мы
                                                                                изготавливаем сперва на
                                                                                станке, а затем доводим
                                                                                вручную, пока она не
                                                                                будет на 100%
                                                                                соответствовать чертежу.
                                                                                Мы не начинаем
                                                                                штамповку, пока она не
                                                                                достигнет максимально
                                                                                точных размеров. Иначе у
                                                                                нас не бывает.</p></div>
                                                                    </div>
                                                                </transition>
                                                            </div>
                                                        </accordion-item>
                                                    </li>
                                                    <li class="accordion__item">
                                                        <accordion-item inline-template
                                                                        :initial="false">
                                                            <div class="accordion-item"
                                                                 :class="{ &quot;is-open&quot;: opened }">
                                                                <div class="accordion-item__header"
                                                                     tabindex="0" data-index="3"
                                                                     @click="toggle"
                                                                     @keypress.enter.space="toggle">
                                                                    <div class="accordion-item__heading">
                                                                        <h3 class="accordion-item__title">
                                                                            Как мне контролировать ход
                                                                            выполнения заказа?</h3>
                                                                    </div>
                                                                    <svg class="accordion-item__arrow">
                                                                        <use xlink:href="/img/sprite.svg#arrow"></use>
                                                                    </svg>
                                                                </div>
                                                                <transition name="fade">
                                                                    <div class="accordion-item__body"
                                                                         v-if="opened">
                                                                        <div class="accordion-item__text text">
                                                                            <p>С самого начала выверяем
                                                                                всё с максимальной
                                                                                точностью. Чем точнее
                                                                                первый этап, тем меньше
                                                                                в дальнейшем будет
                                                                                трудностей. Оснастку мы
                                                                                изготавливаем сперва на
                                                                                станке, а затем доводим
                                                                                вручную, пока она не
                                                                                будет на 100%
                                                                                соответствовать чертежу.
                                                                                Мы не начинаем
                                                                                штамповку, пока она не
                                                                                достигнет максимально
                                                                                точных размеров. Иначе у
                                                                                нас не бывает.</p></div>
                                                                    </div>
                                                                </transition>
                                                            </div>
                                                        </accordion-item>
                                                    </li>
                                                    <li class="accordion__item">
                                                        <accordion-item inline-template
                                                                        :initial="false">
                                                            <div class="accordion-item"
                                                                 :class="{ &quot;is-open&quot;: opened }">
                                                                <div class="accordion-item__header"
                                                                     tabindex="0" data-index="4"
                                                                     @click="toggle"
                                                                     @keypress.enter.space="toggle">
                                                                    <div class="accordion-item__heading">
                                                                        <h3 class="accordion-item__title">
                                                                            Может ли быть так, что
                                                                            деталь не будет
                                                                            соответствовать
                                                                            чертежу?</h3></div>
                                                                    <svg class="accordion-item__arrow">
                                                                        <use xlink:href="/img/sprite.svg#arrow"></use>
                                                                    </svg>
                                                                </div>
                                                                <transition name="fade">
                                                                    <div class="accordion-item__body"
                                                                         v-if="opened">
                                                                        <div class="accordion-item__text text">
                                                                            <p>С самого начала выверяем
                                                                                всё с максимальной
                                                                                точностью. Чем точнее
                                                                                первый этап, тем меньше
                                                                                в дальнейшем будет
                                                                                трудностей. Оснастку мы
                                                                                изготавливаем сперва на
                                                                                станке, а затем доводим
                                                                                вручную, пока она не
                                                                                будет на 100%
                                                                                соответствовать чертежу.
                                                                                Мы не начинаем
                                                                                штамповку, пока она не
                                                                                достигнет максимально
                                                                                точных размеров. Иначе у
                                                                                нас не бывает.</p></div>
                                                                    </div>
                                                                </transition>
                                                            </div>
                                                        </accordion-item>
                                                    </li>
                                                    <li class="accordion__item">
                                                        <accordion-item inline-template
                                                                        :initial="false">
                                                            <div class="accordion-item"
                                                                 :class="{ &quot;is-open&quot;: opened }">
                                                                <div class="accordion-item__header"
                                                                     tabindex="0" data-index="5"
                                                                     @click="toggle"
                                                                     @keypress.enter.space="toggle">
                                                                    <div class="accordion-item__heading">
                                                                        <h3 class="accordion-item__title">
                                                                            Может ли меняться цена в
                                                                            процессе выполнения
                                                                            заказа?</h3></div>
                                                                    <svg class="accordion-item__arrow">
                                                                        <use xlink:href="/img/sprite.svg#arrow"></use>
                                                                    </svg>
                                                                </div>
                                                                <transition name="fade">
                                                                    <div class="accordion-item__body"
                                                                         v-if="opened">
                                                                        <div class="accordion-item__text text">
                                                                            <p>С самого начала выверяем
                                                                                всё с максимальной
                                                                                точностью. Чем точнее
                                                                                первый этап, тем меньше
                                                                                в дальнейшем будет
                                                                                трудностей. Оснастку мы
                                                                                изготавливаем сперва на
                                                                                станке, а затем доводим
                                                                                вручную, пока она не
                                                                                будет на 100%
                                                                                соответствовать чертежу.
                                                                                Мы не начинаем
                                                                                штамповку, пока она не
                                                                                достигнет максимально
                                                                                точных размеров. Иначе у
                                                                                нас не бывает.</p></div>
                                                                    </div>
                                                                </transition>
                                                            </div>
                                                        </accordion-item>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="subsection__form">
                                            <question-form inline-template>
                                                <validation-observer ref="observer">
                                                    <form class="question-form form"
                                                          action="/thanks.html" @submit="onsubmit">
                                                        <header class="form__header"><h3
                                                                    class="form__title title">Или задайте
                                                                свой вопрос</h3></header>
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
                                                                                     :field-name="'name'"
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
                                                                                                name="name"
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
                                                                <div class="col-12">
                                                                    <div class="form__control">
                                                                        <div class="form__field">
                                                                            <v-textarea inline-template
                                                                                        :field-name="'comment'"
                                                                                        :visible-errors="[]">
                                                                                <validation-provider
                                                                                        class="v-textarea"
                                                                                        rules="required"
                                                                                        ref="provider"
                                                                                        :class="{ &quot;is-active&quot;: active, &quot;is-ready&quot;: ready }"
                                                                                        v-slot="{ errors }">
                                                                                    <label class="v-textarea__label"><span
                                                                                                class="v-textarea__placeholder">Ваш вопрос</span><textarea
                                                                                                class="v-textarea__field"
                                                                                                name="comment"
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
                                                        <footer class="question-form__footer form__footer">
                                                            <div class="form__agreement"><label
                                                                        class="checkbox"><input
                                                                            class="checkbox__input"
                                                                            type="checkbox" name="agreement"
                                                                            required><span
                                                                            class="checkbox__label">Заказывая обратный звонок, даю согласие на обработку <a
                                                                                href="/policy.html">персональных данных</a></span></label>
                                                            </div>
                                                            <div class="question-form__button form__button">
                                                                <button class="button is-wide is-large">
                                                                    Отправить вопрос
                                                                </button>
                                                            </div>
                                                        </footer>
                                                    </form>
                                                </validation-observer>
                                            </question-form>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="content__section is-p110">
        <section class="section has-small-title">
            <div class="container">
                <header class="section__header"><h2 class="section__title title">Процесс работ по
                        холодной штамповке</h2></header>
                <div class="section__body">
                    <image-gallery inline-template>
                        <div class="image-gallery" :class="{ &quot;is-ready&quot;: ready }">
                            <div class="image-gallery__inner">
                                <div class="image-gallery__body">
                                    <div class="image-gallery__slider" ref="slider">
                                        <ul class="image-gallery__list" ref="sliderList">
                                            <li class="image-gallery__item" ref="sliderItem"><a
                                                        class="image-gallery__cover lightbox"
                                                        data-group="image-gallery"
                                                        href="/img/history-item-1.jpg"><img
                                                            class="image-gallery__image"
                                                            src="<?= Yii::getAlias('@web') ?>/img/history-item-1.jpg" alt>
                                                    <div class="image-gallery__heading"><h5
                                                                class="image-gallery__title"
                                                                data-swiper-parallax-x="-100">Владимир
                                                            подготавливает оснастку 11</h5></div>
                                                </a></li>
                                            <li class="image-gallery__item" ref="sliderItem"><a
                                                        class="image-gallery__cover lightbox"
                                                        data-group="image-gallery"
                                                        href="/img/gallery-1.jpg"><img
                                                            class="image-gallery__image"
                                                            src="<?= Yii::getAlias('@web') ?>/img/gallery-1.jpg" alt>
                                                    <div class="image-gallery__heading"><h5
                                                                class="image-gallery__title"
                                                                data-swiper-parallax-x="-100">Владимир
                                                            подготавливает оснастку 22</h5></div>
                                                </a></li>
                                            <li class="image-gallery__item" ref="sliderItem"><a
                                                        class="image-gallery__cover lightbox"
                                                        data-group="image-gallery"
                                                        href="/img/feature-cover.jpg"><img
                                                            class="image-gallery__image"
                                                            src="<?= Yii::getAlias('@web') ?>/img/feature-cover.jpg" alt>
                                                    <div class="image-gallery__heading"><h5
                                                                class="image-gallery__title"
                                                                data-swiper-parallax-x="-100">Владимир
                                                            подготавливает оснастку 33</h5></div>
                                                </a></li>
                                            <li class="image-gallery__item" ref="sliderItem"><a
                                                        class="image-gallery__cover lightbox"
                                                        data-group="image-gallery"
                                                        href="/img/about-cover.jpg"><img
                                                            class="image-gallery__image"
                                                            src="<?= Yii::getAlias('@web') ?>/img/about-cover.jpg" alt>
                                                    <div class="image-gallery__heading"><h5
                                                                class="image-gallery__title"
                                                                data-swiper-parallax-x="-100">Владимир
                                                            подготавливает оснастку 44</h5></div>
                                                </a></li>
                                            <li class="image-gallery__item" ref="sliderItem"><a
                                                        class="image-gallery__cover lightbox"
                                                        data-group="image-gallery"
                                                        href="/img/history-item-1.jpg"><img
                                                            class="image-gallery__image"
                                                            src="<?= Yii::getAlias('@web') ?>/img/history-item-1.jpg" alt>
                                                    <div class="image-gallery__heading"><h5
                                                                class="image-gallery__title"
                                                                data-swiper-parallax-x="-100">Владимир
                                                            подготавливает оснастку 15</h5></div>
                                                </a></li>
                                            <li class="image-gallery__item" ref="sliderItem"><a
                                                        class="image-gallery__cover lightbox"
                                                        data-group="image-gallery"
                                                        href="/img/gallery-1.jpg"><img
                                                            class="image-gallery__image"
                                                            src="<?= Yii::getAlias('@web') ?>/img/gallery-1.jpg" alt>
                                                    <div class="image-gallery__heading"><h5
                                                                class="image-gallery__title"
                                                                data-swiper-parallax-x="-100">Владимир
                                                            подготавливает оснастку 26</h5></div>
                                                </a></li>
                                            <li class="image-gallery__item" ref="sliderItem"><a
                                                        class="image-gallery__cover lightbox"
                                                        data-group="image-gallery"
                                                        href="/img/feature-cover.jpg"><img
                                                            class="image-gallery__image"
                                                            src="<?= Yii::getAlias('@web') ?>/img/feature-cover.jpg" alt>
                                                    <div class="image-gallery__heading"><h5
                                                                class="image-gallery__title"
                                                                data-swiper-parallax-x="-100">Владимир
                                                            подготавливает оснастку 37</h5></div>
                                                </a></li>
                                            <li class="image-gallery__item" ref="sliderItem"><a
                                                        class="image-gallery__cover lightbox"
                                                        data-group="image-gallery"
                                                        href="/img/about-cover.jpg"><img
                                                            class="image-gallery__image"
                                                            src="<?= Yii::getAlias('@web') ?>/img/about-cover.jpg" alt>
                                                    <div class="image-gallery__heading"><h5
                                                                class="image-gallery__title"
                                                                data-swiper-parallax-x="-100">Владимир
                                                            подготавливает оснастку 48</h5></div>
                                                </a></li>
                                            <li class="image-gallery__item" ref="sliderItem"><a
                                                        class="image-gallery__cover lightbox"
                                                        data-group="image-gallery"
                                                        href="/img/history-item-1.jpg"><img
                                                            class="image-gallery__image"
                                                            src="<?= Yii::getAlias('@web') ?>/img/history-item-1.jpg" alt>
                                                    <div class="image-gallery__heading"><h5
                                                                class="image-gallery__title"
                                                                data-swiper-parallax-x="-100">Владимир
                                                            подготавливает оснастку 19</h5></div>
                                                </a></li>
                                            <li class="image-gallery__item" ref="sliderItem"><a
                                                        class="image-gallery__cover lightbox"
                                                        data-group="image-gallery"
                                                        href="/img/gallery-1.jpg"><img
                                                            class="image-gallery__image"
                                                            src="<?= Yii::getAlias('@web') ?>/img/gallery-1.jpg" alt>
                                                    <div class="image-gallery__heading"><h5
                                                                class="image-gallery__title"
                                                                data-swiper-parallax-x="-100">Владимир
                                                            подготавливает оснастку 210</h5></div>
                                                </a></li>
                                            <li class="image-gallery__item" ref="sliderItem"><a
                                                        class="image-gallery__cover lightbox"
                                                        data-group="image-gallery"
                                                        href="/img/feature-cover.jpg"><img
                                                            class="image-gallery__image"
                                                            src="<?= Yii::getAlias('@web') ?>/img/feature-cover.jpg" alt>
                                                    <div class="image-gallery__heading"><h5
                                                                class="image-gallery__title"
                                                                data-swiper-parallax-x="-100">Владимир
                                                            подготавливает оснастку 311</h5></div>
                                                </a></li>
                                            <li class="image-gallery__item" ref="sliderItem"><a
                                                        class="image-gallery__cover lightbox"
                                                        data-group="image-gallery"
                                                        href="/img/about-cover.jpg"><img
                                                            class="image-gallery__image"
                                                            src="<?= Yii::getAlias('@web') ?>/img/about-cover.jpg" alt>
                                                    <div class="image-gallery__heading"><h5
                                                                class="image-gallery__title"
                                                                data-swiper-parallax-x="-100">Владимир
                                                            подготавливает оснастку 412</h5></div>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="image-gallery__footer">
                                    <button class="image-gallery__arrow" ref="prev"><span
                                                class="arrow is-left is-grey"><svg class="arrow__icon"
                                                                                   tabindex="-1"><use
                                                        tabindex="-1"
                                                        xlink:href="/img/sprite.svg#arrow"></use></svg></span>
                                    </button>
                                    <div class="image-gallery__roll" ref="roll">
                                        <ul class="image-gallery__thumbs" ref="rollList">
                                            <li class="image-gallery__thumb" ref="rollItem"
                                                @click="clickHandler"><img class="image-gallery__image"
                                                                           src="<?= Yii::getAlias('@web') ?>/img/history-item-1.jpg"
                                                                           alt></li>
                                            <li class="image-gallery__thumb" ref="rollItem"
                                                @click="clickHandler"><img class="image-gallery__image"
                                                                           src="<?= Yii::getAlias('@web') ?>/img/gallery-1.jpg" alt>
                                            </li>
                                            <li class="image-gallery__thumb" ref="rollItem"
                                                @click="clickHandler"><img class="image-gallery__image"
                                                                           src="<?= Yii::getAlias('@web') ?>/img/feature-cover.jpg"
                                                                           alt></li>
                                            <li class="image-gallery__thumb" ref="rollItem"
                                                @click="clickHandler"><img class="image-gallery__image"
                                                                           src="<?= Yii::getAlias('@web') ?>/img/about-cover.jpg"
                                                                           alt></li>
                                            <li class="image-gallery__thumb" ref="rollItem"
                                                @click="clickHandler"><img class="image-gallery__image"
                                                                           src="<?= Yii::getAlias('@web') ?>/img/history-item-1.jpg"
                                                                           alt></li>
                                            <li class="image-gallery__thumb" ref="rollItem"
                                                @click="clickHandler"><img class="image-gallery__image"
                                                                           src="<?= Yii::getAlias('@web') ?>/img/gallery-1.jpg" alt>
                                            </li>
                                            <li class="image-gallery__thumb" ref="rollItem"
                                                @click="clickHandler"><img class="image-gallery__image"
                                                                           src="<?= Yii::getAlias('@web') ?>/img/feature-cover.jpg"
                                                                           alt></li>
                                            <li class="image-gallery__thumb" ref="rollItem"
                                                @click="clickHandler"><img class="image-gallery__image"
                                                                           src="<?= Yii::getAlias('@web') ?>/img/about-cover.jpg"
                                                                           alt></li>
                                            <li class="image-gallery__thumb" ref="rollItem"
                                                @click="clickHandler"><img class="image-gallery__image"
                                                                           src="<?= Yii::getAlias('@web') ?>/img/history-item-1.jpg"
                                                                           alt></li>
                                            <li class="image-gallery__thumb" ref="rollItem"
                                                @click="clickHandler"><img class="image-gallery__image"
                                                                           src="<?= Yii::getAlias('@web') ?>/img/gallery-1.jpg" alt>
                                            </li>
                                            <li class="image-gallery__thumb" ref="rollItem"
                                                @click="clickHandler"><img class="image-gallery__image"
                                                                           src="<?= Yii::getAlias('@web') ?>/img/feature-cover.jpg"
                                                                           alt></li>
                                            <li class="image-gallery__thumb" ref="rollItem"
                                                @click="clickHandler"><img class="image-gallery__image"
                                                                           src="<?= Yii::getAlias('@web') ?>/img/about-cover.jpg"
                                                                           alt></li>
                                        </ul>
                                    </div>
                                    <button class="image-gallery__arrow" ref="next"><span
                                                class="arrow is-grey"><svg class="arrow__icon"
                                                                           tabindex="-1"><use tabindex="-1"
                                                                                              xlink:href="/img/sprite.svg#arrow"></use></svg></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </image-gallery>
                </div>
            </div>
        </section>
    </div>
    <div class="content__section is-dark is-pb100">
        <section class="section">
            <div class="container">
                <header class="section__header"><h2 class="section__title title">Примеры выполненых
                        работ</h2></header>
                <div class="section__body">
                    <example-showcase inline-template>
                        <div class="example-showcase" :class="{ &quot;is-ready&quot;: ready }">
                            <div class="example-showcase__inner">
                                <div class="grid is-row">
                                    <div class="col-6">
                                        <div class="example-showcase__left" ref="leftSlider">
                                            <ul class="example-showcase__slider" ref="leftSliderList">
                                                <li class="example-showcase__slide"
                                                    ref="leftSliderItem"><a
                                                            class="example-showcase__cover lightbox"
                                                            data-group="example"
                                                            href="/img/example-showcase.jpg"><img
                                                                class="example-showcase__image"
                                                                src="<?= Yii::getAlias('@web') ?>/img/example-showcase.jpg" alt><img
                                                                class="example-showcase__schema"
                                                                data-swiper-parallax-x="-60"
                                                                src="<?= Yii::getAlias('@web') ?>/img/example-schema.png" alt></a></li>
                                                <li class="example-showcase__slide"
                                                    ref="leftSliderItem"><a
                                                            class="example-showcase__cover lightbox"
                                                            data-group="example" href="/img/stages.jpg"><img
                                                                class="example-showcase__image"
                                                                src="<?= Yii::getAlias('@web') ?>/img/stages.jpg" alt><img
                                                                class="example-showcase__schema"
                                                                data-swiper-parallax-x="-60"
                                                                src="<?= Yii::getAlias('@web') ?>/img/example-schema.png" alt></a></li>
                                            </ul>
                                            <div class="example-showcase__arrows">
                                                <button class="example-showcase__arrow" ref="prev"><span
                                                            class="arrow is-left is-grey "><svg
                                                                class="arrow__icon" tabindex="-1"><use
                                                                    tabindex="-1"
                                                                    xlink:href="/img/sprite.svg#arrow"></use></svg></span>
                                                </button>
                                                <button class="example-showcase__arrow" ref="next"><span
                                                            class="arrow is-grey "><svg class="arrow__icon"
                                                                                        tabindex="-1"><use
                                                                    tabindex="-1"
                                                                    xlink:href="/img/sprite.svg#arrow"></use></svg></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="example-showcase__right" ref="rightSlider">
                                            <ul class="example-showcase__slider" ref="rightSliderList">
                                                <li class="example-showcase__slide"
                                                    ref="rightSliderItem">
                                                    <div class="example-showcase__body">
                                                        <div class="example-showcase__header"><h4
                                                                    class="example-showcase__title"
                                                                    data-swiper-parallax-x="-80">100 000
                                                                дверных петель для фирмы производителя
                                                                дверей</h4>
                                                            <div class="example-showcase__descr text"
                                                                 data-swiper-parallax-x="-150"><p>Форма
                                                                    петель не типовая,дизайнерская. Поэтому
                                                                    основные трудозатраты - создание форм и
                                                                    оснастка. А дальше дело техники</p>
                                                            </div>
                                                        </div>
                                                        <div class="example-showcase__info"
                                                             data-swiper-parallax-x="-220">
                                                            <div class="grid is-columns">
                                                                <div class="col-6">
                                                                    <div class="info-item"><h5
                                                                                class="info-item__title">
                                                                            Выполнили в срок:</h5>
                                                                        <p class="info-item__text">за
                                                                            560 часов</p></div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="info-item"><h5
                                                                                class="info-item__title">
                                                                            Потребовалось металла:</h5>
                                                                        <p class="info-item__text">10
                                                                            тонн</p></div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="info-item"><h5
                                                                                class="info-item__title">
                                                                            Стоимость:</h5>
                                                                        <p class="info-item__text">700
                                                                            000 руб., включая создание
                                                                            форм (270 000 руб.)</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="example-showcase__slide"
                                                    ref="rightSliderItem">
                                                    <div class="example-showcase__body">
                                                        <div class="example-showcase__header"><h4
                                                                    class="example-showcase__title"
                                                                    data-swiper-parallax-x="-80">100 000
                                                                дверных петель для фирмы производителя
                                                                дверей 2</h4>
                                                            <div class="example-showcase__descr text"
                                                                 data-swiper-parallax-x="-150"><p>Форма
                                                                    петель не типовая,дизайнерская. Поэтому
                                                                    основные трудозатраты - создание форм и
                                                                    оснастка. А дальше дело техники</p>
                                                            </div>
                                                        </div>
                                                        <div class="example-showcase__info"
                                                             data-swiper-parallax-x="-220">
                                                            <div class="grid is-columns">
                                                                <div class="col-6">
                                                                    <div class="info-item"><h5
                                                                                class="info-item__title">
                                                                            Выполнили в срок:</h5>
                                                                        <p class="info-item__text">за
                                                                            560 часов</p></div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="info-item"><h5
                                                                                class="info-item__title">
                                                                            Потребовалось металла:</h5>
                                                                        <p class="info-item__text">10
                                                                            тонн</p></div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="info-item"><h5
                                                                                class="info-item__title">
                                                                            Стоимость:</h5>
                                                                        <p class="info-item__text">700
                                                                            000 руб., включая создание
                                                                            форм (270 000 руб.)</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </example-showcase>
                </div>
            </div>
        </section>
    </div>
    <div class="content__section is-p110">
        <section class="section">
            <div class="container">
                <div class="grid is-row">
                    <div class="col-4">
                        <header class="section__header"><h2 class="section__title title">Стоимость
                                работ</h2></header>
                    </div>
                    <div class="col-8">
                        <div class="section__aside">
                            <div class="section__pricelist">
                                <div class="pricelist">
                                    <div class="pricelist__header">
                                        <div class="grid is-row">
                                            <div class="col-70p"><p class="pricelist__label">Объем
                                                    заказа</p></div>
                                            <div class="col-30p"><p class="pricelist__label is-last">
                                                    Цена</p></div>
                                        </div>
                                    </div>
                                    <div class="pricelist__body">
                                        <ul class="pricelist__list">
                                            <li class="pricelist__item">
                                                <div class="grid is-row is-middle">
                                                    <div class="col-70p"><h5 class="pricelist__title">
                                                            Листы свыше 50 000 м², 5 мм толщина</h5>
                                                        <p class="pricelist__caption">76-90 рабочих
                                                            дней</p></div>
                                                    <div class="col-30p"><p class="pricelist__cost">950
                                                            000 ₽</p></div>
                                                </div>
                                            </li>
                                            <li class="pricelist__item">
                                                <div class="grid is-row is-middle">
                                                    <div class="col-70p"><h5 class="pricelist__title">
                                                            Листы 20 000 - 50 000 м², 5 мм толщина</h5>
                                                        <p class="pricelist__caption">76-90 рабочих
                                                            дней</p></div>
                                                    <div class="col-30p"><p class="pricelist__cost">650
                                                            000 ₽</p></div>
                                                </div>
                                            </li>
                                            <li class="pricelist__item">
                                                <div class="grid is-row is-middle">
                                                    <div class="col-70p"><h5 class="pricelist__title">
                                                            Листы 10 000 - 20 000 м², 5 мм толщина</h5>
                                                        <p class="pricelist__caption">76-90 рабочих
                                                            дней</p></div>
                                                    <div class="col-30p"><p class="pricelist__cost">450
                                                            000 ₽</p></div>
                                                </div>
                                            </li>
                                            <li class="pricelist__item">
                                                <div class="grid is-row is-middle">
                                                    <div class="col-70p"><h5 class="pricelist__title">
                                                            Листы до 10 000 м², 5 мм толщина</h5>
                                                        <p class="pricelist__caption">76-90 рабочих
                                                            дней</p></div>
                                                    <div class="col-30p"><p class="pricelist__cost">450
                                                            000 ₽</p></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
