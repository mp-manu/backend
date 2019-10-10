<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 09.10.2019
 * Time: 22:57
 */

?>

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
                        Гибка металлопрофиля</h3>
                </div>
                <svg class="accordion-item__arrow">
                    <use xlink:href="/img/sprite.svg#arrow"></use>
                </svg>
            </div>
            <transition name="fade">
                <div class="accordion-item__body"
                     v-if="opened">
                    <div class="accordion-item__text text">
                        <p>Это самый
                            распространённый способ
                            изготовления карнизов,
                            рельс для дверей,
                            оконных откосов,
                            металлических уголков
                            для декорирования
                            помещений, скоб, самых
                            сложных металлических
                            коробов для компьютерной
                            и другой техники и мн.
                            др.</p></div>
                    <div class="accordion-item__equipment">
                        <article class="equipment">
                            <figure class="equipment__cover">
                                <img class="equipment__image"
                                     src="/img/equipment.jpg"
                                     alt></figure>
                            <header class="equipment__header">
                                <p class="equipment__caption">
                                    Используемое
                                    оборудование: </p>
                                <h3 class="equipment__title">
                                    Stalex
                                    ESR-2020</h3>
                                <p class="equipment__descr">
                                    Комбинированный
                                    станок
                                    вальцовочный
                                    электромеханический</p>
                            </header>
                        </article>
                    </div>
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
                        Гибка труб</h3></div>
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
