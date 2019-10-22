<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 08.10.2019
 * Time: 19:09
 */

$this->title = $service['name'];


echo $this->render('/page/banners/banner', ['service' => $service]);

?>

<div class="content__body">
    <!---------------SECTION преимушество, оборудование SERVICE INFO--------------------->
   <?php if (!empty($serviceInfo)): ?>
       <div class="content__section is-pb110">
           <section class="section">
               <div class="container">
                   <div class="section__body">
                       <div class="options">
                           <ul class="options__list grid is-row">
                              <?php
                                $k=0; foreach ($serviceInfo as $info): $k++;
                                $k = ($k==4) ? 1 : $k;
                              ?>
                                  <li class="options__item col-4">
                                      <article class="option">
                                          <header class="option__header">
                                              <img class="option__icon" src="<?= Yii::getAlias('@uploads') ?>/services/<?= $info['img'] ?>" alt>
                                              <h3 class="option__title"><?= $info['val'] ?></h3>
                                          </header>
                                          <div class="option__body">
                                              <ul class="option__list">
                                                 <?php
                                                 if (substr($info['description'], -1) == '.') {
                                                    $info['description'] = substr_replace($info['description'], "", -1);
                                                 }
                                                 $description = explode('.', $info['description']);
                                                 foreach ($description as $item):
                                                    ?>
                                                     <li class="option__item"><?= $item ?></li>
                                                 <?php endforeach; ?>
                                              </ul>
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
    <!---------------END SECTION преимушество, оборудование SERVICE INFO--------------------->

    <!---------------SECTION вопросы и ответы форма вопрос ANSWER QUESTION--------------------->
   <?php if(!empty($answerQuestions)): ?>
       <div class="content__section is-grey is-p100">
           <section class="section">
               <div class="container">
                   <div class="section__body">
                       <div class="grid is-row">
                           <div class="col-11">
                               <div class="section__subsection">
                                   <section class="subsection">
                                       <header class="subsection__header">
                                           <h3 class="subsection__title">
                                               Вопрос ответ
                                           </h3>
                                       </header>
                                       <div class="subsection__body">
                                           <div class="subsection__accordion">
                                               <div class="accordion">
                                                   <ul class="accordion__list">
                                                      <?php
                                                      $i = 0;
                                                      foreach($answerQuestions as $question):
                                                         $i++;
                                                         $true = ($i == 1) ? 'true' : $true='false';
                                                      ?>
                                                             <li class="accordion__item">
                                                                 <accordion-item inline-template :initial="<?=$true?>">
                                                                     <div class="accordion-item"
                                                                          :class="{ &quot;is-open&quot;: opened }">
                                                                         <div class="accordion-item__header"
                                                                              tabindex="0" data-index="<?= $i ?>"
                                                                              @click="toggle"
                                                                              @keypress.enter.space="toggle">
                                                                             <div class="accordion-item__heading">
                                                                                 <h3 class="accordion-item__title">
                                                                                    <?= $question['question'] ?></h3>
                                                                             </div>
                                                                             <svg class="accordion-item__arrow">
                                                                                 <use xlink:href="/img/sprite.svg#arrow"></use>
                                                                             </svg>
                                                                         </div>
                                                                         <transition name="fade">
                                                                             <div class="accordion-item__body"
                                                                                  v-if="opened">
                                                                                 <div class="accordion-item__text text">
                                                                                     <p><?= $question['answer'] ?></p>
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
                                           <div class="subsection__form">
                                               <question-form inline-template>
                                                   <validation-observer ref="observer">
                                                       <form class="question-form form" action="/request/question" @submit="onsubmit" method="post">
                                                           <header class="form__header">
                                                               <h3 class="form__title title">Или задайте свой вопрос</h3>
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
                                                                                                   @blur="handler(&quot;blur&quot;)">
                                                                                           <span class="v-input__errors"
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
                                                                                   href="/page/privacy-policy">персональных данных</a></span></label>
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
   <?php endif; ?>
    <!---------------END SECTION вопросы и ответы форма вопрос ANSWER QUESTION--------------------->

    <!---------------SECTION процесс работы WORK PROCCESS--------------------->
   <?php if(!empty($workProccess)): ?>
       <div class="content__section is-p110">
           <section class="section has-small-title">
               <div class="container">
                   <header class="section__header">
                       <h2 class="section__title title"><?= $workProccess[0]['title'] ?></h2>
                   </header>
                   <div class="section__body">
                       <image-gallery inline-template>
                           <div class="image-gallery" :class="{ &quot;is-ready&quot;: ready }">
                               <div class="image-gallery__inner">
                                   <div class="image-gallery__body">
                                       <div class="image-gallery__slider" ref="slider">
                                           <ul class="image-gallery__list" ref="sliderList">
                                              <?php foreach ($workProccess as $proccess): ?>
                                                  <li class="image-gallery__item" ref="sliderItem"><a
                                                              class="image-gallery__cover lightbox"
                                                              data-group="image-gallery"
                                                              href="<?= Yii::getAlias('@uploads') ?>/proccess/<?= $proccess['img'] ?>"><img
                                                                  class="image-gallery__image"
                                                                  src="<?= Yii::getAlias('@uploads') ?>/proccess/<?= $proccess['img'] ?>"
                                                                  alt>
                                                          <div class="image-gallery__heading"><h5
                                                                      class="image-gallery__title"
                                                                      data-swiper-parallax-x="-100"><?= $proccess['description'] ?></h5>
                                                          </div>
                                                      </a></li>
                                              <?php endforeach; ?>
                                           </ul>
                                       </div>
                                   </div>
                                   <div class="image-gallery__footer">
                                       <button class="image-gallery__arrow" ref="prev">
                                           <span class="arrow is-left is-grey">
                                               <svg class="arrow__icon" tabindex="-1">
                                                   <use tabindex="-1" xlink:href="/img/sprite.svg#arrow">
                                                   </use>
                                               </svg>
                                           </span>
                                       </button>
                                       <div class="image-gallery__roll" ref="roll">
                                           <ul class="image-gallery__thumbs" ref="rollList">
                                              <?php foreach ($workProccess as $proccess): ?>
                                                  <li class="image-gallery__thumb" ref="rollItem"
                                                      @click="clickHandler">
                                                      <img class="image-gallery__image" src="<?= Yii::getAlias('@uploads') ?>/proccess/<?= $proccess['img'] ?>"
                                                           alt>
                                                  </li>
                                              <?php endforeach; ?>
                                           </ul>
                                       </div>
                                       <button class="image-gallery__arrow" ref="next">
                                        <span class="arrow is-grey"><svg class="arrow__icon" tabindex="-1">
                                            <use tabindex="-1" xlink:href="/img/sprite.svg#arrow"></use></svg>
                                        </span>
                                       </button>
                                   </div>
                               </div>
                           </div>
                       </image-gallery>
                   </div>
               </div>
           </section>
       </div>
    <?php endif; ?>
    <!---------------END SECTION процесс работы WORK PROCCESS--------------------->

    <!---------------SECTION результат работы WORK RESULT--------------------->
   <?php if(!empty($workResults)): ?>
       <div class="content__section is-dark is-pb100">
           <section class="section">
               <div class="container">
                   <header class="section__header"><h2 class="section__title title"><?= Yii::$app->settings->get('Текст', 'пример_работ') ?></h2>
                   </header>
                   <div class="section__body">
                       <example-showcase inline-template>
                           <div class="example-showcase" :class="{ &quot;is-ready&quot;: ready }">
                               <div class="example-showcase__inner">
                                   <div class="grid is-row">
                                       <div class="col-6">
                                           <div class="example-showcase__left" ref="leftSlider">
                                               <ul class="example-showcase__slider" ref="leftSliderList">
                                                  <?php foreach ($workResults as $result): ?>
                                                      <li class="example-showcase__slide"
                                                          ref="leftSliderItem"><a
                                                                  class="example-showcase__cover lightbox"
                                                                  data-group="example"
                                                                  href="<?= Yii::getAlias('@uploads') ?>/results/<?= $result['img'] ?>">
                                                              <img class="example-showcase__image"
                                                                   src="<?= Yii::getAlias('@uploads') ?>/results/<?= $result['img'] ?>"
                                                                   alt>
                                                              <img class="example-showcase__schema"
                                                                   data-swiper-parallax-x="-60"
                                                                   src="<?= Yii::getAlias('@uploads') ?>/results/<?= $result['img_draw'] ?>"
                                                                   alt></a>
                                                      </li>
                                                  <?php endforeach; ?>
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
                                                  <?php foreach ($workResults as $result): ?>
                                                      <li class="example-showcase__slide"
                                                          ref="rightSliderItem">
                                                          <div class="example-showcase__body">
                                                              <div class="example-showcase__header"><h4
                                                                          class="example-showcase__title"
                                                                          data-swiper-parallax-x="-80"><?= $result['name'] ?></h4>
                                                                  <div class="example-showcase__descr text"
                                                                       data-swiper-parallax-x="-150">
                                                                      <p><?= $result['description'] ?></p>
                                                                  </div>
                                                              </div>
                                                              <div class="example-showcase__info"
                                                                   data-swiper-parallax-x="-220">
                                                                  <div class="grid is-columns">
                                                                      <div class="col-6">
                                                                          <div class="info-item"><h5
                                                                                      class="info-item__title">
                                                                                  Выполнили в срок:</h5>
                                                                              <p class="info-item__text">
                                                                                 <?= $result['deadline'] ?></p></div>
                                                                      </div>
                                                                      <div class="col-6">
                                                                          <div class="info-item"><h5
                                                                                      class="info-item__title">
                                                                                  Потребовалось металла:</h5>
                                                                              <p class="info-item__text"><?= $result['tooked_metall'] ?></p>
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-12">
                                                                          <div class="info-item">
                                                                              <h5 class="info-item__title">
                                                                                  Стоимость:
                                                                              </h5>
                                                                              <p class="info-item__text">
                                                                                 <?= $result['price'] ?>
                                                                              </p>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </li>
                                                  <?php endforeach; ?>
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
   <?php endif; ?>
    <!---------------END SECTION результат работы WORK RESULT--------------------->

    <!---------------SECTION Виды под услуг виды гибки метала--------------------->
   <?php if(!empty($subServices)): ?>
       <div class="content__section is-pb110">
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
                                                                             <?php if(!empty($service['desc'])): ?>
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
                                                                             <?php endif; ?>
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
                                               <img class="subsection__image" src="<?= Yii::getAlias('@web') ?>/uploads/<?= Yii::$app->images->get('Виды гибки метала', 'виды_гибка_метала') ?>" alt>
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
   <?php endif; ?>
    <!---------------END SECTION Виды под услуг виды гибки метала--------------------->

    <!---------------SECTION PRICELIST МАТРИЦА Прайслистов --------------------->
   <?php if(!empty($activeServicesId) && !empty($data)): ?>
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
                                              <?php $i=0; foreach ($activeServicesId as $id): $i++; $isActive = ($i == 1) ? 'is-active' : ''; ?>
                                                  <button class="page-tabs__toggle <?= $isActive ?>"
                                                          data-tab-index="<?= $i-1 ?>" @click="goto">
                                                     <?= $data['name'][$id] ?>
                                                  </button>
                                              <?php endforeach; ?>
                                           </div>
                                       </div>
                                       <div class="page-tabs__body" ref="swiper">
                                           <ul class="page-tabs__list" ref="list">
                                              <?php foreach ($activeServicesId as $id): ?>
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
                                                                     <?php foreach ($data['depth'][$id] as $depth): ?>
                                                                         <td><?= $depth ?> мм</td>
                                                                     <?php endforeach; ?>
                                                                  </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                  <?php foreach ($data['price'] as $price => $depth): ?>
                                                                      <tr>
                                                                          <td><?= $price ?></td>
                                                                         <?php foreach ($depth as $item): ?>
                                                                                <?php if(isset($item[$id])): ?>
                                                                                <td><?= $item[$id] ?> ₽</td>
                                                                                <?php endif; ?>
                                                                         <?php endforeach; ?>
                                                                      </tr>
                                                                  <?php endforeach; ?>
                                                                  </tbody>
                                                              </table>
                                                          </div>
                                                      </div>
                                                  </li>
                                              <?php endforeach; ?>
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
   <?php endif; ?>
    <!---------------END SECTION PRICELIST МАТРИЦА Прайслистов --------------------->

    <!---------------SECTION PRICELIST Список ------------------------->
   <?php if(!empty($priceList)): ?>
       <div class="content__section is-p110">
           <section class="section">
               <div class="container">
                   <div class="grid is-row">
                       <div class="col-4">
                           <header class="section__header"><h2 class="section__title title">Стоимость работ</h2></header>
                       </div>
                       <div class="col-8">
                           <div class="section__aside">
                               <div class="section__pricelist">
                                   <div class="pricelist">
                                       <div class="pricelist__header">
                                           <div class="grid is-row">
                                               <div class="col-70p"><p class="pricelist__label">Объем заказа</p></div>
                                               <div class="col-30p"><p class="pricelist__label is-last">Цена</p></div>
                                           </div>
                                       </div>
                                       <div class="pricelist__body">
                                           <ul class="pricelist__list">
                                              <?php foreach ($priceList as $list): ?>
                                                  <li class="pricelist__item">
                                                      <div class="grid is-row is-middle">
                                                          <div class="col-70p">
                                                              <h5 class="pricelist__title">
                                                                 <?= $list['description'] ?>
                                                              </h5>
                                                              <p class="pricelist__caption"><?= $list['deadline'] ?> рабочих дней</p></div>
                                                          <div class="col-30p"><p class="pricelist__cost">
                                                                <?= $list['price'] ?> ₽</p></div>
                                                      </div>
                                                  </li>
                                              <?php endforeach; ?>
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
   <?php endif; ?>
    <!---------------END SECTION PRICELIST Список --------------------->







































</div>