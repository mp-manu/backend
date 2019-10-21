<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 08.10.2019
 * Time: 21:55
 */


?>

<div class="content__slider">
    <main-slider inline-template>
        <div class="main-slider" :class="{ &quot;is-ready&quot;: ready }">
            <div class="main-slider__inner" ref="swiper">
                <ul class="main-slider__list" ref="list">
                    <?php foreach ($slider as $item): ?>
                        <li class="main-slider__item" ref="item">
                            <article class="slide">
                                <div class="slide__background" style="background-image: url(<?= Yii::getAlias('@uploads') . '/slider/' . $item['img_url'] ?>);" data-swiper-parallax-x="-30">
                                </div>
                                <div class="slide__container container">
                                    <div class="slide__grid grid is-row">
                                        <div class="col-6">
                                            <div class="slide__body">
                                                <header class="slide__header">
                                                    <h2 class="slide__title title" data-swiper-parallax-x="-40">
                                                        <?= $item['title'] ?>
                                                    </h2>
                                                    <p class="slide__caption" data-swiper-parallax-x="-70">
                                                       <?= $item['description'] ?>
                                                    </p>
                                                </header>
                                                <div class="slide__button" data-swiper-parallax-x="-100">
                                                    <?php if ($item['is_has_btn'] == 1): ?>
                                                        <button class="button is-big"
                                                                data-modal="callback-with-attach"><?= $item['btn_title'] ?>
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if (!empty($item['slide_cover'])): ?>
                                            <div class="col-6">
                                                <figure class="slide__cover" data-swiper-parallax-x="-100">
                                                    <img class="slide__image" src="<?= Yii::getAlias('@uploads') . '/slider/' . $item['slide_cover'] ?>" alt>
                                                </figure>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </article>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="main-slider__controls">
                    <div class="main-slider__container container">
                        <div class="main-slider__arrows">
                            <button class="main-slider__arrow" ref="prev"><span class="arrow is-left"><svg
                                            class="arrow__icon" tabindex="-1"><use tabindex="-1"
                                                                                   xlink:href="/img/sprite.svg#arrow"></use></svg></span>
                            </button>
                            <button class="main-slider__arrow" ref="next"><span class="arrow"><svg
                                            class="arrow__icon" tabindex="-1"><use tabindex="-1"
                                                                                   xlink:href="/img/sprite.svg#arrow"></use></svg></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main-slider>
</div>
