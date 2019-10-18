<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 17.10.2019
 * Time: 18:09
 */
$this->title='Политика конфиденциальности';
?>

<div class="content__headline">
   <header class="headline has-cover">
      <div class="headline__cover" style="background-image: url(/uploads/<?= Yii::$app->images->get('Баннер', 'политика_и_конфиден') ?>"></div>
      <div class="container">
         <div class="grid is-row">
            <div class="col-8">
               <div class="headline__body">
                  <div class="headline__breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb__item"><a class="breadcrumb__link"
                                                        href="/" title="Главная">Главная</a>
                        </li>
                        <li class="breadcrumb__item"><a class="breadcrumb__link"
                                                        href="/page/privacy-policy" title="Политика">Политика конфиденциальности</a>
                        </li>
                     </ul>
                  </div>
                  <h1 class="headline__title title">Политика конфиденциальности</h1>
               </div>
            </div>
         </div>
      </div>
   </header>
</div>
<?php if(!empty($data)): ?>
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
                                            Политика конфиденциальности
                                        </h3>
                                    </header>
                                    <div class="subsection__body">
                                        <div class="subsection__accordion">
                                            <div class="accordion">
                                                <ul class="accordion__list">
                                                   <?php
                                                   $i = 0;
                                                   foreach($data as $item):
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
                                                                              <?= $item[0]['title'] ?></h3>
                                                                       </div>
                                                                       <svg class="accordion-item__arrow">
                                                                           <use xlink:href="/img/sprite.svg#arrow"></use>
                                                                       </svg>
                                                                   </div>
                                                                   <transition name="fade">
                                                                       <div class="accordion-item__body"
                                                                            v-if="opened">
                                                                           <div class="accordion-item__text text">
                                                                               <?php foreach($item['childs'] as $text): ?>
                                                                               <p><?php echo $text['description']  ?></p>
                                                                                <?php endforeach; ?>
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
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php endif; ?>