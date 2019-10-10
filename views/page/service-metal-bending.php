<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 08.10.2019
 * Time: 19:09
 */
$this->title = 'Гибка метала';
echo $this->render('/page/banners/service-metal-bending', ['service' => $service]);
?>

<div class="content__body">
    <div class="content__section is-pb110">
        <?php if(!empty($subServices)): ?>
        <section class="section">
            <div class="container">
                <div class="section__body">
                    <div class="section__subsection">
                        <section class="subsection">
                            <header class="subsection__header"><h3 class="subsection__title"><span><i>Виды</i> гибки метала</span>
                                </h3></header>
                            <div class="subsection__body">
                                <div class="grid is-row">
                                    <div class="col-6">
                                        <div class="subsection__accordion">
                                            <div class="accordion">
                                                <ul class="accordion__list">
                                                    <?php
                                                        $i=0; foreach ($subServices as $service): $i+=1;
                                                        if($i == 1){
                                                            $class = 'true';
                                                        }else{
                                                            $class = 'false';
                                                        }
                                                    ?>
                                                    <li class="accordion__item">
                                                        <accordion-item inline-template :initial="<?= $class ?>">
                                                            <div class="accordion-item"
                                                                 :class="{ &quot;is-open&quot;: opened }">
                                                                <div class="accordion-item__header"
                                                                     tabindex="0" data-index="<?= $i ?>"
                                                                     @click="toggle"
                                                                     @keypress.enter.space="toggle">
                                                                    <div class="accordion-item__heading">
                                                                        <h3 class="accordion-item__title">
                                                                            <?= $service['name'] ?></h3>
                                                                    </div>
                                                                    <svg class="accordion-item__arrow">
                                                                        <use xlink:href="/img/sprite.svg#arrow"></use>
                                                                    </svg>
                                                                </div>
                                                                <transition name="fade">
                                                                    <div class="accordion-item__body"
                                                                         v-if="opened">
                                                                        <div class="accordion-item__text text">
                                                                            <p><?= $service['description'] ?></p></div>
                                                                        <div class="accordion-item__equipment">
                                                                            <article class="equipment">
                                                                                <figure class="equipment__cover">
                                                                                    <img class="equipment__image"
                                                                                         src="/img/<?= $service['img'] ?>"
                                                                                         alt></figure>
                                                                                <header class="equipment__header">
                                                                                    <p class="equipment__caption">
                                                                                        Используемое
                                                                                        оборудование: </p>
                                                                                    <h3 class="equipment__title">
                                                                                        <?= $service['val'] ?></h3>
                                                                                    <p class="equipment__descr">
                                                                                       <?= $service['desc'] ?></p>
                                                                                </header>
                                                                            </article>
                                                                        </div>
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
                                    <div class="col-6">
                                        <div class="subsection__aside">
                                            <img class="subsection__image" src="/img/image2.jpg" alt>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
    </div>
    <div class="content__section is-pb110 is-pt0">
        <section class="section">
            <div class="container">
                <header class="section__header"><h2 class="section__title title">Стоимость работ</h2>
                </header>
                <div class="section__body">
                    <div class="section__tabs">
                        <page-tabs inline-template>
                            <div class="page-tabs" :class="{ &quot;is-ready&quot;: ready }">
                                <div class="page-tabs__inner">
                                    <div class="page-tabs__header">
                                        <div class="page-tabs__toggles" ref="toggles">
<!--                                            --><?php //foreach ($activeServicesId as $id): ?>
                                            <button class="page-tabs__toggle is-active"
                                                    data-tab-index="0" @click="goto">
                                                Гибка металлопрофиля
                                            </button>
<!--                                            --><?php //endforeach; ?>
                                            <button class="page-tabs__toggle" data-tab-index="1"
                                                    @click="goto">Гибка труб
                                            </button>
                                            <button class="page-tabs__toggle" data-tab-index="2"
                                                    @click="goto">Гибка листового метала
                                            </button>
                                            <button class="page-tabs__toggle" data-tab-index="3"
                                                    @click="goto">Гибка стальных листов
                                            </button>
                                        </div>
                                    </div>
                                    <div class="page-tabs__body" ref="swiper">
                                        <ul class="page-tabs__list" ref="list">
                                            <li class="page-tabs__item" ref="item">
                                                <div class="page-tabs__fx" data-swiper-parallax-x="-20">
                                                    <div class="price-table">
                                                        <table>
                                                            <thead>
                                                            <tr>
                                                                <td class="is-sep" rowspan="2">
                                                                    <span>Длина гиба (мм)</span><span>Толщина листа</span>
                                                                </td>
                                                                <td colspan="7">Цена за гиб (заказ от
                                                                    100 гибов)
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>1 мм</td>
                                                                <td>2 мм</td>
                                                                <td>3 мм</td>
                                                                <td>4 мм</td>
                                                                <td>5 мм</td>
                                                                <td>5.5 мм</td>
                                                                <td>6 мм</td>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>100</td>
                                                                <td>10 ₽</td>
                                                                <td>10 ₽</td>
                                                                <td>10 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>13 ₽</td>
                                                            </tr>
                                                            <tr>
                                                                <td>200</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>16 ₽</td>
                                                            </tr>
                                                            <tr>
                                                                <td>500</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>16 ₽</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="page-tabs__item" ref="item">
                                                <div class="page-tabs__fx" data-swiper-parallax-x="-20">
                                                    <div class="price-table">
                                                        <table>
                                                            <thead>
                                                            <tr>
                                                                <td class="is-sep" rowspan="2">
                                                                    <span>Длина гиба (мм)</span><span>Толщина листа</span>
                                                                </td>
                                                                <td colspan="7">Цена за гиб (заказ от
                                                                    100 гибов)
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>1 мм</td>
                                                                <td>2 мм</td>
                                                                <td>3 мм</td>
                                                                <td>4 мм</td>
                                                                <td>5 мм</td>
                                                                <td>5.5 мм</td>
                                                                <td>6 мм</td>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>100</td>
                                                                <td>10 ₽</td>
                                                                <td>10 ₽</td>
                                                                <td>10 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>13 ₽</td>
                                                            </tr>
                                                            <tr>
                                                                <td>200</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>16 ₽</td>
                                                            </tr>
                                                            <tr>
                                                                <td>500</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>16 ₽</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="page-tabs__item" ref="item">
                                                <div class="page-tabs__fx" data-swiper-parallax-x="-20">
                                                    <div class="price-table">
                                                        <table>
                                                            <thead>
                                                            <tr>
                                                                <td class="is-sep" rowspan="2">
                                                                    <span>Длина гиба (мм)</span><span>Толщина листа</span>
                                                                </td>
                                                                <td colspan="7">Цена за гиб (заказ от
                                                                    100 гибов)
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>1 мм</td>
                                                                <td>2 мм</td>
                                                                <td>3 мм</td>
                                                                <td>4 мм</td>
                                                                <td>5 мм</td>
                                                                <td>5.5 мм</td>
                                                                <td>6 мм</td>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>100</td>
                                                                <td>10 ₽</td>
                                                                <td>10 ₽</td>
                                                                <td>10 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>13 ₽</td>
                                                            </tr>
                                                            <tr>
                                                                <td>200</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>16 ₽</td>
                                                            </tr>
                                                            <tr>
                                                                <td>500</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>16 ₽</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="page-tabs__item" ref="item">
                                                <div class="page-tabs__fx" data-swiper-parallax-x="-20">
                                                    <div class="price-table">
                                                        <table>
                                                            <thead>
                                                            <tr>
                                                                <td class="is-sep" rowspan="2">
                                                                    <span>Длина гиба (мм)</span><span>Толщина листа</span>
                                                                </td>
                                                                <td colspan="7">Цена за гиб (заказ от
                                                                    100 гибов)
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>1 мм</td>
                                                                <td>2 мм</td>
                                                                <td>3 мм</td>
                                                                <td>4 мм</td>
                                                                <td>5 мм</td>
                                                                <td>5.5 мм</td>
                                                                <td>6 мм</td>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>100</td>
                                                                <td>10 ₽</td>
                                                                <td>10 ₽</td>
                                                                <td>10 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>13 ₽</td>
                                                            </tr>
                                                            <tr>
                                                                <td>200</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>16 ₽</td>
                                                            </tr>
                                                            <tr>
                                                                <td>500</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>12 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>14 ₽</td>
                                                                <td>16 ₽</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </page-tabs>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>