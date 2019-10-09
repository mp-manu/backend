<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 08.10.2019
 * Time: 0:17
 */

?>

<div class="content__headline">
    <header class="headline has-cover">
        <div class="headline__cover" style="background-image: url(/img/about-cover.jpg)"></div>
        <div class="container">
            <div class="grid is-row">
                <div class="col-8">
                    <div class="headline__body">
                        <div class="headline__breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb__item"><a class="breadcrumb__link"
                                                                href="/index.html" title="Главная">Главная</a>
                                </li>
                            </ul>
                        </div>
                        <h1 class="headline__title title">Компания ТехАрсенал</h1>
                        <div class="headline__descr text"><p>На сегодняшний день обработка металла
                                холодной штамповкой – наиболее прогрессивный метод. Так можно получить
                                детали различных размеров, форм и конфигураций. Они сразу готовы к
                                использованию и не требуют последующего термического воздействия, что
                                значительно упрощает процесс и позволяет его автоматизировать. Рассмотрим
                                все особенности такой обработки давлением.</p></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
<div class="content__body">
    <div class="content__section is-pb110">
        <section class="section">
            <div class="container">
                <div class="section__body">
                    <div class="section__info">
                        <div class="info">
                            <div class="grid is-row is-middle">
                                <div class="col-8">
                                    <div class="info__text text"><p>Производим методом холодной
                                            штамповки более 2000 видов стандартных деталей. А также
                                            разрабатываем уникальные формы на заказ для серийной
                                            штамповки.</p></div>
                                </div>
                                <div class="col-4">
                                    <div class="info__caption">Штампуем уникальные детали по&nbsp;чертежам</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section__info">
                        <div class="info">
                            <div class="grid is-row is-middle">
                                <div class="col-8">
                                    <div class="info__text text"><p>Наша продукция: металлоизделия по
                                            чертежам, закладные для ЖБИ, винтовые сваи, скребки, диски, цепи
                                            коммунальной техники.</p>
                                        <p>Выполняем полный цикл изготовления продукции от заказа и
                                            чертежа до готового изделия</p></div>
                                </div>
                                <div class="col-4">
                                    <div class="info__caption">Холодная штамповка «под&nbsp;ключ»</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="content__section is-pt0">
        <section class="section">
            <div class="container">
                <header class="section__header"><h2 class="section__title title">История компании</h2>
                </header>
                <div class="section__body">
                    <company-history inline-template>
                        <div class="company-history" :class="{ &quot;is-ready&quot;: ready }">
                            <div class="company-history__inner">
                                <div class="company-history__body">
                                    <div class="company-history__slider" ref="slider">
                                        <ul class="company-history__list" ref="sliderList">
                                            <li class="company-history__item" ref="sliderItem">
                                                <article class="history-item">
                                                    <figure class="history-item__cover"><img
                                                            class="history-item__image" alt
                                                            src="/img/history-item-1.jpg"></figure>
                                                    <div class="grid is-row">
                                                        <div class="col-6 shift-3">
                                                            <div class="history-item__inner">
                                                                <header class="history-item__header"
                                                                        data-swiper-parallax-x="-20">
                                                                    <time class="history-item__year">
                                                                        2008
                                                                    </time>
                                                                    <h2 class="history-item__title">С
                                                                        чего все начиналось</h2>
                                                                </header>
                                                                <div class="history-item__body">
                                                                    <div class="history-item__text text"
                                                                         data-swiper-parallax-x="-40">
                                                                        <p>Идейным вдохновителем был
                                                                            Дмитрий Семёнов. Как-то ему
                                                                            были нужны качественные
                                                                            детали для станка цеха отца,
                                                                            который достался ему по
                                                                            наследству.</p>
                                                                        <p>Он изучил рынок и выяснил,
                                                                            что в Смоленске нет
                                                                            качественных деталей. Их
                                                                            пришлось заказывать у
                                                                            китайских штамповщиков.
                                                                            Тогда Дмитрийи решил, что мы
                                                                            тоже можем заниматься
                                                                            штамповкой в
                                                                            Смоленске...</p></div>
                                                                </div>
                                                                <footer class="history-item__footer">
                                                                    <div class="history-item__person"
                                                                         data-swiper-parallax-x="-60">
                                                                        <div class="person is-light is-simple">
                                                                            <div class="person__name">
                                                                                Дмитрий Семенов
                                                                            </div>
                                                                            <div class="person__position">
                                                                                Основатель компании
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </footer>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </li>
                                            <li class="company-history__item" ref="sliderItem">
                                                <article class="history-item">
                                                    <figure class="history-item__cover"><img
                                                            class="history-item__image" alt
                                                            src="/img/history-item-1.jpg"></figure>
                                                    <div class="grid is-row">
                                                        <div class="col-6 shift-3">
                                                            <div class="history-item__inner">
                                                                <header class="history-item__header"
                                                                        data-swiper-parallax-x="-20">
                                                                    <time class="history-item__year">
                                                                        2009
                                                                    </time>
                                                                    <h2 class="history-item__title">С
                                                                        чего все начиналось</h2>
                                                                </header>
                                                                <div class="history-item__body">
                                                                    <div class="history-item__text text"
                                                                         data-swiper-parallax-x="-40">
                                                                        <p>Идейным вдохновителем был
                                                                            Дмитрий Семёнов. Как-то ему
                                                                            были нужны качественные
                                                                            детали для станка цеха отца,
                                                                            который достался ему по
                                                                            наследству.</p>
                                                                        <p>Он изучил рынок и выяснил,
                                                                            что в Смоленске нет
                                                                            качественных деталей. Их
                                                                            пришлось заказывать у
                                                                            китайских штамповщиков.
                                                                            Тогда Дмитрийи решил, что мы
                                                                            тоже можем заниматься
                                                                            штамповкой в
                                                                            Смоленске...</p></div>
                                                                </div>
                                                                <footer class="history-item__footer">
                                                                    <div class="history-item__person"
                                                                         data-swiper-parallax-x="-60">
                                                                        <div class="person is-light is-simple">
                                                                            <div class="person__name">
                                                                                Дмитрий Семенов
                                                                            </div>
                                                                            <div class="person__position">
                                                                                Основатель компании
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </footer>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </li>
                                            <li class="company-history__item" ref="sliderItem">
                                                <article class="history-item">
                                                    <figure class="history-item__cover"><img
                                                            class="history-item__image" alt
                                                            src="/img/history-item-1.jpg"></figure>
                                                    <div class="grid is-row">
                                                        <div class="col-6 shift-3">
                                                            <div class="history-item__inner">
                                                                <header class="history-item__header"
                                                                        data-swiper-parallax-x="-20">
                                                                    <time class="history-item__year">
                                                                        2012
                                                                    </time>
                                                                    <h2 class="history-item__title">С
                                                                        чего все начиналось</h2>
                                                                </header>
                                                                <div class="history-item__body">
                                                                    <div class="history-item__text text"
                                                                         data-swiper-parallax-x="-40">
                                                                        <p>Идейным вдохновителем был
                                                                            Дмитрий Семёнов. Как-то ему
                                                                            были нужны качественные
                                                                            детали для станка цеха отца,
                                                                            который достался ему по
                                                                            наследству.</p>
                                                                        <p>Он изучил рынок и выяснил,
                                                                            что в Смоленске нет
                                                                            качественных деталей. Их
                                                                            пришлось заказывать у
                                                                            китайских штамповщиков.
                                                                            Тогда Дмитрийи решил, что мы
                                                                            тоже можем заниматься
                                                                            штамповкой в
                                                                            Смоленске...</p></div>
                                                                </div>
                                                                <footer class="history-item__footer">
                                                                    <div class="history-item__person"
                                                                         data-swiper-parallax-x="-60">
                                                                        <div class="person is-light is-simple">
                                                                            <div class="person__name">
                                                                                Дмитрий Семенов
                                                                            </div>
                                                                            <div class="person__position">
                                                                                Основатель компании
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </footer>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </li>
                                            <li class="company-history__item" ref="sliderItem">
                                                <article class="history-item">
                                                    <figure class="history-item__cover"><img
                                                            class="history-item__image" alt
                                                            src="/img/history-item-1.jpg"></figure>
                                                    <div class="grid is-row">
                                                        <div class="col-6 shift-3">
                                                            <div class="history-item__inner">
                                                                <header class="history-item__header"
                                                                        data-swiper-parallax-x="-20">
                                                                    <time class="history-item__year">
                                                                        2014
                                                                    </time>
                                                                    <h2 class="history-item__title">С
                                                                        чего все начиналось</h2>
                                                                </header>
                                                                <div class="history-item__body">
                                                                    <div class="history-item__text text"
                                                                         data-swiper-parallax-x="-40">
                                                                        <p>Идейным вдохновителем был
                                                                            Дмитрий Семёнов. Как-то ему
                                                                            были нужны качественные
                                                                            детали для станка цеха отца,
                                                                            который достался ему по
                                                                            наследству.</p>
                                                                        <p>Он изучил рынок и выяснил,
                                                                            что в Смоленске нет
                                                                            качественных деталей. Их
                                                                            пришлось заказывать у
                                                                            китайских штамповщиков.
                                                                            Тогда Дмитрийи решил, что мы
                                                                            тоже можем заниматься
                                                                            штамповкой в
                                                                            Смоленске...</p></div>
                                                                </div>
                                                                <footer class="history-item__footer">
                                                                    <div class="history-item__person"
                                                                         data-swiper-parallax-x="-60">
                                                                        <div class="person is-light is-simple">
                                                                            <div class="person__name">
                                                                                Дмитрий Семенов
                                                                            </div>
                                                                            <div class="person__position">
                                                                                Основатель компании
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </footer>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </li>
                                            <li class="company-history__item" ref="sliderItem">
                                                <article class="history-item">
                                                    <figure class="history-item__cover"><img
                                                            class="history-item__image" alt
                                                            src="/img/history-item-1.jpg"></figure>
                                                    <div class="grid is-row">
                                                        <div class="col-6 shift-3">
                                                            <div class="history-item__inner">
                                                                <header class="history-item__header"
                                                                        data-swiper-parallax-x="-20">
                                                                    <time class="history-item__year">
                                                                        2016
                                                                    </time>
                                                                    <h2 class="history-item__title">С
                                                                        чего все начиналось</h2>
                                                                </header>
                                                                <div class="history-item__body">
                                                                    <div class="history-item__text text"
                                                                         data-swiper-parallax-x="-40">
                                                                        <p>Идейным вдохновителем был
                                                                            Дмитрий Семёнов. Как-то ему
                                                                            были нужны качественные
                                                                            детали для станка цеха отца,
                                                                            который достался ему по
                                                                            наследству.</p>
                                                                        <p>Он изучил рынок и выяснил,
                                                                            что в Смоленске нет
                                                                            качественных деталей. Их
                                                                            пришлось заказывать у
                                                                            китайских штамповщиков.
                                                                            Тогда Дмитрийи решил, что мы
                                                                            тоже можем заниматься
                                                                            штамповкой в
                                                                            Смоленске...</p></div>
                                                                </div>
                                                                <footer class="history-item__footer">
                                                                    <div class="history-item__person"
                                                                         data-swiper-parallax-x="-60">
                                                                        <div class="person is-light is-simple">
                                                                            <div class="person__name">
                                                                                Дмитрий Семенов
                                                                            </div>
                                                                            <div class="person__position">
                                                                                Основатель компании
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </footer>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </li>
                                            <li class="company-history__item" ref="sliderItem">
                                                <article class="history-item">
                                                    <figure class="history-item__cover"><img
                                                            class="history-item__image" alt
                                                            src="/img/history-item-1.jpg"></figure>
                                                    <div class="grid is-row">
                                                        <div class="col-6 shift-3">
                                                            <div class="history-item__inner">
                                                                <header class="history-item__header"
                                                                        data-swiper-parallax-x="-20">
                                                                    <time class="history-item__year">
                                                                        2019
                                                                    </time>
                                                                    <h2 class="history-item__title">С
                                                                        чего все начиналось</h2>
                                                                </header>
                                                                <div class="history-item__body">
                                                                    <div class="history-item__text text"
                                                                         data-swiper-parallax-x="-40">
                                                                        <p>Идейным вдохновителем был
                                                                            Дмитрий Семёнов. Как-то ему
                                                                            были нужны качественные
                                                                            детали для станка цеха отца,
                                                                            который достался ему по
                                                                            наследству.</p>
                                                                        <p>Он изучил рынок и выяснил,
                                                                            что в Смоленске нет
                                                                            качественных деталей. Их
                                                                            пришлось заказывать у
                                                                            китайских штамповщиков.
                                                                            Тогда Дмитрийи решил, что мы
                                                                            тоже можем заниматься
                                                                            штамповкой в
                                                                            Смоленске...</p></div>
                                                                </div>
                                                                <footer class="history-item__footer">
                                                                    <div class="history-item__person"
                                                                         data-swiper-parallax-x="-60">
                                                                        <div class="person is-light is-simple">
                                                                            <div class="person__name">
                                                                                Дмитрий Семенов
                                                                            </div>
                                                                            <div class="person__position">
                                                                                Основатель компании
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </footer>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="company-history__controls">
                                    <button class="company-history__arrow" ref="prev"><span
                                            class="arrow is-up"><svg class="arrow__icon" tabindex="-1"><use
                                                    tabindex="-1"
                                                    xlink:href="/img/sprite.svg#arrow"></use></svg></span>
                                    </button>
                                    <div class="company-history__roll" ref="roll">
                                        <ul class="company-history__thumbs" ref="rollList">
                                            <li class="company-history__thumb" ref="rollItem"
                                                data-year="2008" @click="clickHandler">
                                                <div class="company-history__cover"><img
                                                        class="company-history__image"
                                                        src="/img/history-item-1.jpg" alt></div>
                                            </li>
                                            <li class="company-history__thumb" ref="rollItem"
                                                data-year="2009" @click="clickHandler">
                                                <div class="company-history__cover"><img
                                                        class="company-history__image"
                                                        src="/img/history-item-1.jpg" alt></div>
                                            </li>
                                            <li class="company-history__thumb" ref="rollItem"
                                                data-year="2012" @click="clickHandler">
                                                <div class="company-history__cover"><img
                                                        class="company-history__image"
                                                        src="/img/history-item-1.jpg" alt></div>
                                            </li>
                                            <li class="company-history__thumb" ref="rollItem"
                                                data-year="2014" @click="clickHandler">
                                                <div class="company-history__cover"><img
                                                        class="company-history__image"
                                                        src="/img/history-item-1.jpg" alt></div>
                                            </li>
                                            <li class="company-history__thumb" ref="rollItem"
                                                data-year="2016" @click="clickHandler">
                                                <div class="company-history__cover"><img
                                                        class="company-history__image"
                                                        src="/img/history-item-1.jpg" alt></div>
                                            </li>
                                            <li class="company-history__thumb" ref="rollItem"
                                                data-year="2019" @click="clickHandler">
                                                <div class="company-history__cover"><img
                                                        class="company-history__image"
                                                        src="/img/history-item-1.jpg" alt></div>
                                            </li>
                                        </ul>
                                    </div>
                                    <button class="company-history__arrow" ref="next"><span
                                            class="arrow is-down"><svg class="arrow__icon"
                                                                       tabindex="-1"><use tabindex="-1"
                                                                                          xlink:href="/img/sprite.svg#arrow"></use></svg></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </company-history>
                </div>
            </div>
        </section>
    </div>
    <div class="content__section is-pb100 is-pt0">
        <section class="section">
            <div class="container">
                <div class="section__body">
                    <div class="section__subsection">
                        <section class="subsection">
                            <header class="subsection__header"><h3 class="subsection__title">Как мы
                                    работаем</h3></header>
                            <div class="subsection__body">
                                <div class="grid is-row">
                                    <div class="col-11">
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
                                                                            подробностей</h3>
                                                                        <p class="accordion-item__caption">
                                                                            Моделирование. Создание
                                                                            оснастки. Доведение оснастки
                                                                            до чистовой формы</p></div>
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
                                                                            металла</h3>
                                                                        <p class="accordion-item__caption">
                                                                            Контроль качества металла.
                                                                            Запуск серийной
                                                                            штамповки</p></div>
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
                                                                            качество</h3>
                                                                        <p class="accordion-item__caption">
                                                                            Контроль качества металла.
                                                                            Запуск серийной
                                                                            Отбракованные детали на
                                                                            переплавку. Этап
                                                                            корректировки.<br>Что ещё мы
                                                                            можем улучшить?</p></div>
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
                                                                            переплавку</h3>
                                                                        <p class="accordion-item__caption">
                                                                            Чтобы контролировать
                                                                            качество продукции, мы
                                                                            наняли эксперта. Этап
                                                                            корректировки.<br>Что ещё мы
                                                                            можем улучшить?</p></div>
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
