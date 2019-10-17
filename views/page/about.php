<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 08.10.2019
 * Time: 0:17
 */
$this->title = 'О компании';
?>

<div class="content__headline">
    <header class="headline has-cover">
        <div class="headline__cover" style="background-image: url(/uploads/<?=$banner[0]['img']?>)"></div>
        <div class="container">
            <div class="grid is-row">
                <div class="col-8">
                    <div class="headline__body">
                        <div class="headline__breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb__item"><a class="breadcrumb__link"
                                                                href="/" title="Главная">Главная</a>
                                </li>
                            </ul>
                        </div>
                        <h1 class="headline__title title"><?=$banner[0]['title']?></h1>
                        <div class="headline__descr text"><p><?=$banner[0]['description']?></p></div>
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
                    <?php foreach ($info as $item): ?>
                    <div class="section__info">
                        <div class="info">
                            <div class="grid is-row is-middle">
                                <div class="col-8">
                                    <div class="info__text text"><p>
                                            <?= $item['description'] ?>
                                        </p></div>
                                </div>
                                <div class="col-4">
                                    <div class="info__caption"><?= $item['title'] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>
    <?php if(!empty($history)): ?>
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
                                            <?php foreach ($history as $item): ?>
                                            <li class="company-history__item" ref="sliderItem">
                                                <article class="history-item">
                                                    <figure class="history-item__cover"><img
                                                                class="history-item__image" alt
                                                                src="/uploads/<?=$item['img']?>"></figure>
                                                    <div class="grid is-row">
                                                        <div class="col-6 shift-3">
                                                            <div class="history-item__inner">
                                                                <header class="history-item__header"
                                                                        data-swiper-parallax-x="-20">
                                                                    <time class="history-item__year">
                                                                        <?=$item['alias']?>
                                                                    </time>
                                                                    <h2 class="history-item__title">
                                                                        <?=$item['title']?>
                                                                    </h2>
                                                                </header>
                                                                <div class="history-item__body">
                                                                    <div class="history-item__text text"
                                                                         data-swiper-parallax-x="-40">
                                                                        <?=$item['description']?>
                                                                    </div>
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
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="company-history__controls">
                                    <button class="company-history__arrow" ref="prev">
                                        <span class="arrow is-up"><svg class="arrow__icon" tabindex="-1">
                                                <use tabindex="-1" xlink:href="/img/sprite.svg#arrow"></use></svg></span>
                                    </button>
                                    <div class="company-history__roll" ref="roll">
                                        <ul class="company-history__thumbs" ref="rollList">
                                            <?php foreach ($history as $item): ?>
                                            <li class="company-history__thumb" ref="rollItem" data-year="<?= $item['alias'] ?>" @click="clickHandler">
                                                <div class="company-history__cover">
                                                    <img class="company-history__image" src="/uploads/<?= $item['img'] ?>" alt></div>
                                            </li>
                                            <? endforeach; ?>
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
    <?php endif; ?>
    <div class="content__section is-pb100 is-pt0">
        <section class="section">
            <div class="container">
                <div class="section__body">
                    <?php if (!empty($howWeWork)): ?>
                        <div class="section__subsection">
                            <section class="subsection">
                                <div class="grid is-row">
                                    <div class="col-11">
                                        <header class="subsection__header">
                                            <h3 class="subsection__title">
                                                <?= Yii::$app->settings->get('Текст', 'Как мы работаем') ?>
                                            </h3>
                                        </header>
                                        <div class="subsection__body">
                                            <div class="subsection__accordion">
                                                <div class="accordion">
                                                    <ul class="accordion__list">
                                                        <?php $i = 0;
                                                        foreach ($howWeWork as $work): $i++;
                                                            $true = ($i > 0) ? 'true' : 'false'; ?>
                                                            <li class="accordion__item">
                                                                <accordion-item inline-template :initial="<?= $true ?>">
                                                                    <div class="accordion-item"
                                                                         :class="{ &quot;is-open&quot;: opened }">
                                                                        <div class="accordion-item__header"
                                                                             tabindex="<?= $i - 1 ?>" data-index="<?= $i ?>"
                                                                             @click="toggle"
                                                                             @keypress.enter.space="toggle">
                                                                            <div class="accordion-item__heading">
                                                                                <h3 class="accordion-item__title">
                                                                                    <?= $work['title'] ?></h3></div>
                                                                            <svg class="accordion-item__arrow">
                                                                                <use xlink:href="/img/sprite.svg#arrow"></use>
                                                                            </svg>
                                                                        </div>
                                                                        <transition name="fade">
                                                                            <div class="accordion-item__body"
                                                                                 v-if="opened">
                                                                                <div class="accordion-item__text text">
                                                                                    <p><?= $work['description'] ?></p></div>
                                                                            </div>
                                                                        </transition>
                                                                    </div>
                                                                </accordion-item>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>
    <?php if (!empty($whyChooseUs)): ?>
        <div class="content__section is-grey">
            <section class="section">
                <div class="container">
                    <header class="section__header"><h2
                                class="section__title title"><?= Yii::$app->settings->get('Текст', 'Почему мы') ?></h2>
                    </header>
                    <div class="section__body">
                        <div class="features">
                            <ul class="features__list grid is-columns">
                                <?php foreach ($whyChooseUs as $chooseUs): ?>
                                    <li class="features__item col-6">
                                        <article class="feature">
                                            <figure class="feature__cover">
                                                <img class="feature__image" src="/uploads/<?= $chooseUs['img'] ?>"
                                                     alt="<?= $chooseUs['description'] ?>">
                                            </figure>
                                            <div class="feature__body">
                                                <img class="feature__icon" src="/uploads/<?= $chooseUs['ico'] ?>" alt>
                                                <h4 class="feature__title">
                                                    <?= $chooseUs['description'] ?>
                                                </h4>
                                            </div>
                                        </article>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <?php endif; ?>

</div>
