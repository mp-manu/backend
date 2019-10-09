<?php
/* @var $this yii\web\View */
$this->title = 'Главная';
echo $this->render('/page/banners/slider', ['slider' => $slider]);
?>

<div class="content__body">
    <div class="content__intro">
        <div class="container">
            <div class="intro">
                <div class="grid is-row">
                    <div class="col-3">
                        <div class="intro__label"><i>Теx</i>Арсенал</div>
                    </div>
                    <div class="col-9">
                        <div class="intro__body"><p class="intro__text">Производим методом холодной
                                штамповки более 2000 видов стандартных деталей, разрабатываем уникальные
                                формы на заказ для серийной штамповки.</p>
                            <div class="intro__opinion">
                                <article class="opinion">
                                    <figure class="opinion__cover"><img class="opinion__image"
                                                                        src="/img/person.jpg"
                                                                        alt="Дмитрий Соляник"></figure>
                                    <div class="opinion__body"><p class="opinion__text">Самая трудоёмкая
                                            часть производства на заказ - создание оснастки (формы).
                                            Необходимо точно сделать компьютерный расчет формы, а затем
                                            выполнить ее в материале. Стоимость изготовления уникальной
                                            оснастки от 100 000 руб. Затем переходим к серийной
                                            штамповке.</p>
                                        <header class="opinion__header"><h3 class="opinion__name">
                                                Дмитрий Соляник</h3>
                                            <p class="opinion__position">Руководитель цеха штамповки</p>
                                        </header>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content__image">
        <div class="container"><img class="image" src="/img/image.jpg" alt></div>
    </div>
    <div class="content__section is-grey">
        <section class="section">
            <div class="container">
                <div class="section__body">
                    <div class="service-showcase">
                        <div class="grid is-row is-middle">
                            <div class="col-4">
                                <div class="service-showcase__header"><h2
                                            class="service-showcase__title title">Холодная штамповка</h2>
                                    <p class="service-showcase__descr">Производим детали методом
                                        холодной штамповки по чертежам. Доводим оснастку до идеальной
                                        формы и соответствия чертежу.</p>
                                    <p class="service-showcase__warn">Минимальный заказ — 100 шт</p>
                                    <div class="service-showcase__link"><a class="link"
                                                                           href="/service.html">
                                            <div class="link__inner"><span class="link__text">Перейти к услуге</span>
                                                <div class="link__arrow"><span
                                                            class="arrow is-small is-dark no-hover"><svg
                                                                class="arrow__icon" tabindex="-1"><use tabindex="-1"
                                                                                                       xlink:href="/img/sprite.svg#arrow"></use></svg></span>
                                                </div>
                                            </div>
                                        </a></div>
                                </div>
                            </div>
                            <div class="col-6 shift-1">
                                <div class="service-showcase__body">
                                    <div class="service-showcase__examples">
                                        <div class="examples">
                                            <ul class="examples__list">
                                                <li class="examples__item">
                                                    <div class="example">
                                                        <div class="example__header" data-number="01">
                                                            <h4 class="example__title">Дверные
                                                                петли</h4></div>
                                                        <div class="example__cover"><img
                                                                    class="example__image"
                                                                    src="/img/example-1.png" alt></div>
                                                    </div>
                                                </li>
                                                <li class="examples__item">
                                                    <div class="example">
                                                        <div class="example__header" data-number="02">
                                                            <h4 class="example__title">Проводные
                                                                короба</h4></div>
                                                        <div class="example__cover"><img
                                                                    class="example__image"
                                                                    src="/img/example-2.png" alt></div>
                                                    </div>
                                                </li>
                                                <li class="examples__item">
                                                    <div class="example">
                                                        <div class="example__header" data-number="03">
                                                            <h4 class="example__title">Дверные
                                                                петли</h4></div>
                                                        <div class="example__cover"><img
                                                                    class="example__image"
                                                                    src="/img/example-3.png" alt></div>
                                                    </div>
                                                </li>
                                                <li class="examples__item">
                                                    <div class="example">
                                                        <div class="example__header" data-number="04">
                                                            <h4 class="example__title">По вашему
                                                                чертежу...</h4></div>
                                                        <div class="example__cover"><img
                                                                    class="example__image"
                                                                    src="/img/example-4.png" alt></div>
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
            </div>
        </section>
    </div>
    <div class="content__section is-pb110">
        <section class="section">
            <div class="container">
                <div class="section__body">
                    <div class="section__subsection">
                        <section class="subsection">
                            <header class="subsection__header"><h3 class="subsection__title">Прочие
                                    услуги</h3></header>
                            <div class="subsection__body">
                                <div class="services">
                                    <ul class="services__list grid is-columns">
                                        <li class="services__item col-3 col-3">
                                            <article class="service">
                                                <figure class="service__cover"><img
                                                            class="service__image" src="/img/service.jpg"
                                                            alt="Гибка металла"></figure>
                                                <div class="service__body"><img class="service__icon"
                                                                                src="/img/service-ico-1.svg"
                                                                                alt><h4
                                                            class="service__title"><a class="service__link"
                                                                                      href="/service.html">Гибка
                                                            металла</a></h4></div>
                                            </article>
                                        </li>
                                        <li class="services__item col-3 col-3">
                                            <article class="service">
                                                <figure class="service__cover"><img
                                                            class="service__image" src="/img/service.jpg"
                                                            alt="Порошковая окраска и цинкование"></figure>
                                                <div class="service__body"><img class="service__icon"
                                                                                src="/img/service-ico-2.svg"
                                                                                alt><h4
                                                            class="service__title"><a class="service__link"
                                                                                      href="/service.html">Порошковая
                                                            окраска и цинкование</a></h4></div>
                                            </article>
                                        </li>
                                        <li class="services__item col-3 col-3">
                                            <article class="service">
                                                <figure class="service__cover"><img
                                                            class="service__image" src="/img/service.jpg"
                                                            alt="Плазменная резка"></figure>
                                                <div class="service__body"><img class="service__icon"
                                                                                src="/img/service-ico-3.svg"
                                                                                alt><h4
                                                            class="service__title"><a class="service__link"
                                                                                      href="/service.html">Плазменная
                                                            резка</a></h4></div>
                                            </article>
                                        </li>
                                        <li class="services__item col-3 col-3">
                                            <article class="service">
                                                <figure class="service__cover"><img
                                                            class="service__image" src="/img/service.jpg"
                                                            alt="Сварочные работы"></figure>
                                                <div class="service__body"><img class="service__icon"
                                                                                src="/img/service-ico-4.svg"
                                                                                alt><h4
                                                            class="service__title"><a class="service__link"
                                                                                      href="/service.html">Сварочные
                                                            работы</a></h4></div>
                                            </article>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="section__subsection">
                        <section class="subsection">
                            <div class="grid is-row">
                                <div class="col-6">
                                    <header class="subsection__header"><h3 class="subsection__title">Как
                                            мы работаем</h3></header>
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
                                                                            Принятие чертежа. Уточнение
                                                                            подробностей</h3></div>
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
                                                                            Расчёт количества
                                                                            металла</h3></div>
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
                                                                            Эксперт контролирует
                                                                            качество</h3></div>
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
                                                                            Отбракованные детали на
                                                                            переплавку</h3></div>
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
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="subsection__aside"><img class="subsection__image"
                                                                        src="/img/stages.jpg" alt></div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="content__section is-grey">
        <section class="section">
            <div class="container">
                <header class="section__header"><h2 class="section__title title">Почему мы</h2></header>
                <div class="section__body">
                    <div class="features">
                        <ul class="features__list grid is-columns">
                            <li class="features__item col-6">
                                <article class="feature">
                                    <figure class="feature__cover"><img class="feature__image"
                                                                        src="/img/feature-cover.jpg"
                                                                        alt="100% совпадение&lt;br&gt;с&amp;nbsp;чертежами заказчика">
                                    </figure>
                                    <div class="feature__body"><img class="feature__icon"
                                                                    src="/img/feature-1.png" alt><h4
                                                class="feature__title">100% совпадение<br>с&nbsp;чертежами
                                            заказчика</h4></div>
                                </article>
                            </li>
                            <li class="features__item col-6">
                                <article class="feature">
                                    <figure class="feature__cover"><img class="feature__image"
                                                                        src="/img/feature-cover.jpg"
                                                                        alt="Мы реализуем все этапы производства.&lt;br&gt;Никаких субподрядчиков">
                                    </figure>
                                    <div class="feature__body"><img class="feature__icon"
                                                                    src="/img/feature-2.png" alt><h4
                                                class="feature__title">Мы реализуем все этапы
                                            производства.<br>Никаких субподрядчиков</h4></div>
                                </article>
                            </li>
                            <li class="features__item col-6">
                                <article class="feature">
                                    <figure class="feature__cover"><img class="feature__image"
                                                                        src="/img/feature-cover.jpg"
                                                                        alt="Годами отработанная технология по&amp;nbsp;всем&lt;br&gt;представленным услугам">
                                    </figure>
                                    <div class="feature__body"><img class="feature__icon"
                                                                    src="/img/feature-3.png" alt><h4
                                                class="feature__title">Годами отработанная технология по&nbsp;всем<br>представленным
                                            услугам</h4></div>
                                </article>
                            </li>
                            <li class="features__item col-6">
                                <article class="feature">
                                    <figure class="feature__cover"><img class="feature__image"
                                                                        src="/img/feature-cover.jpg"
                                                                        alt="Годами отработанная технология по&amp;nbsp;всем&lt;br&gt;представленным услугам">
                                    </figure>
                                    <div class="feature__body"><img class="feature__icon"
                                                                    src="/img/feature-4.png" alt><h4
                                                class="feature__title">Годами отработанная технология по&nbsp;всем<br>представленным
                                            услугам</h4></div>
                                </article>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>