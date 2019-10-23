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
                        <div class="intro__label"><?= Yii::$app->settings->get('Сайт', 'имя') ?></div>
                    </div>
                    <div class="col-9">
                        <div class="intro__body">
                            <p class="intro__text"><?= Yii::$app->settings->get('Компания', 'деятельность') ?></p>
                            <div class="intro__opinion">
                                <article class="opinion">
                                    <figure class="opinion__cover">
                                        <img class="opinion__image"
                                             src="<?= Yii::getAlias('@web') ?>/uploads/<?= Yii::$app->images->get('Главная', 'руков_цеха') ?>"
                                             alt="<?= Yii::$app->settings->get('Сотрудник', 'руков_цеха_штамп') ?>">
                                    </figure>
                                    <div class="opinion__body">
                                        <p class="opinion__text">
                                           <?= Yii::$app->settings->get('Текст', 'слова_руков_цеха_штамп') ?>
                                        </p>
                                        <header class="opinion__header"><h3 class="opinion__name">
                                              <?= Yii::$app->settings->get('Сотрудник', 'руков_цеха_штамп') ?></h3>
                                            <p class="opinion__position"><?= Yii::$app->settings->get('Должность', 'руков_цеха_штамп') ?></p>
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
        <div class="container">
            <img class="image" src="<?= Yii::getAlias('@web') ?>/uploads/<?= Yii::$app->images->get('Главная страница', 'большая_картинка') ?>" alt>
        </div>
    </div>
    <div class="content__section is-grey">
        <section class="section">
            <div class="container">
                <div class="section__body">
                    <div class="service-showcase">
                        <div class="grid is-row is-middle">
                            <div class="col-4">
                                <div class="service-showcase__header">
                                    <h2 class="service-showcase__title title"><?= Yii::$app->settings->get('Услуги', 'холодная_штамповка') ?></h2>
                                    <p class="service-showcase__descr"><?= Yii::$app->settings->get('Услуги', 'инфо_об_холод_штамп') ?></p>
                                    <p class="service-showcase__warn"><?= Yii::$app->settings->get('Услуги', 'мин_заказ') ?></p>
                                    <div class="service-showcase__link">
                                        <a class="link" href="/page/service/1">
                                            <div class="link__inner">
                                                <span class="link__text"><?= Yii::$app->settings->get('Главная', 'перейти_к_услуге') ?></span>
                                                <div class="link__arrow">
                                                    <span class="arrow is-small is-dark no-hover">
                                                        <svg class="arrow__icon" tabindex="-1">
                                                            <use tabindex="-1" xlink:href="/img/sprite.svg#arrow"></use>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 shift-1">
                                <div class="service-showcase__body">
                                    <div class="service-showcase__examples">
                                        <div class="examples">
                                            <ul class="examples__list">
                                                <li class="examples__item">
                                                    <div class="example">
                                                        <div class="example__header"
                                                             data-number="01">
                                                            <h4 class="example__title">
                                                               <?= Yii::$app->settings->get('Главная', 'дверные_петли') ?>
                                                            </h4>
                                                        </div>
                                                        <div class="example__cover">
                                                            <img class="example__image"
                                                                 src="/uploads/<?= Yii::$app->images->get('Главная', 'дверные_петли') ?>" alt>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="examples__item">
                                                    <div class="example">
                                                        <div class="example__header"
                                                             data-number="02">
                                                            <h4 class="example__title">
                                                               <?= Yii::$app->settings->get('Главная', 'проводные_короба') ?>
                                                            </h4>
                                                        </div>
                                                        <div class="example__cover">
                                                            <img class="example__image"
                                                                 src="/uploads/<?= Yii::$app->images->get('Главная', 'проводные_короба') ?>" alt>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="examples__item">
                                                    <div class="example">
                                                        <div class="example__header"
                                                             data-number="03">
                                                            <h4 class="example__title">
                                                               <?= Yii::$app->settings->get('Главная', 'дверные_петли') ?>
                                                            </h4>
                                                        </div>
                                                        <div class="example__cover">
                                                            <img class="example__image"
                                                                 src="/uploads/<?= Yii::$app->images->get('Главная', 'дверные_петли2') ?>" alt>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="examples__item">
                                                    <div class="example">
                                                        <div class="example__header" data-number="04">
                                                            <h4 class="example__title">
                                                               <?= Yii::$app->settings->get('Главная', 'по_вышему_чертежу') ?>
                                                            </h4>
                                                        </div>
                                                        <div class="example__cover">
                                                            <img class="example__image" src="/uploads/<?= Yii::$app->images->get('Главная', 'по_вашему_чертежу') ?>" alt>
                                                        </div>
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
    <?php if(!empty($otherServices)): ?>
    <div class="content__section is-pb110">
        <section class="section">
            <div class="container">
                <div class="section__body">
                    <div class="section__subsection">
                        <section class="subsection">
                            <header class="subsection__header">
                                <h3 class="subsection__title"><?= Yii::$app->settings->get('Текст', 'Прочие услуги') ?></h3>
                            </header>
                            <div class="subsection__body">
                                <div class="services">
                                    <ul class="services__list grid is-columns">
                                       <?php foreach ($otherServices as $info): $i = rand(1, 6); ?>
                                           <li class="services__item col-3 col-3">
                                               <article class="service">
                                                   <figure class="service__cover">
                                                       <img class="service__image"
                                                            src="/uploads/services/<?= $info['img'] ?>"
                                                            alt="<?= $info['name'] ?>">
                                                   </figure>
                                                   <div class="service__body">
                                                       <img class="service__icon" src="/img/service-ico-<?= $i ?>.svg" alt="">
                                                       <h4 class="service__title">
                                                           <a class="service__link" target="_blank" href="/page/service/<?= $info['alias'] ?>">
                                                              <?= $info['name'] ?>
                                                           </a>
                                                       </h4>
                                                   </div>
                                               </article>
                                           </li>
                                       <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </section>
                    </div>
                   <?php if (!empty($howWeWork)): ?>
                       <div class="section__subsection">
                           <section class="subsection">
                               <div class="grid is-row">
                                   <div class="col-6">
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
                                                         $true = ($i == 1) ? 'true' : 'false'; ?>
                                                          <li class="accordion__item">
                                                              <accordion-item inline-template
                                                                              :initial="<?= $true ?>">
                                                                  <div class="accordion-item"
                                                                       :class="{ &quot;is-open&quot;: opened }">
                                                                      <div class="accordion-item__header"
                                                                           tabindex="<?= $i - 1 ?>"
                                                                           data-index="<?= $i ?>"
                                                                           @click="toggle"
                                                                           @keypress.enter.space="toggle">
                                                                          <div class="accordion-item__heading">
                                                                              <h3 class="accordion-item__title">
                                                                                 <?= $work['title'] ?></h3>
                                                                          </div>
                                                                          <svg class="accordion-item__arrow">
                                                                              <use xlink:href="/img/sprite.svg#arrow"></use>
                                                                          </svg>
                                                                      </div>
                                                                      <transition name="fade">
                                                                          <div class="accordion-item__body"
                                                                               v-if="opened">
                                                                              <div class="accordion-item__text text">
                                                                                  <p><?= $work['description'] ?></p>
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
                                   </div>
                                   <div class="col-6">
                                       <div class="subsection__aside">
                                           <img class="subsection__image"
                                                src="/img/<?= Yii::$app->images->get('Главная', 'как_мы_работаем') ?>"
                                                alt>
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
    <?php endif; ?>
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
                                              <img class="feature__image"
                                                   src="/uploads/<?= $chooseUs['img'] ?>"
                                                   alt="<?= $chooseUs['description'] ?>">
                                          </figure>
                                          <div class="feature__body">
                                              <img class="feature__icon"
                                                   src="/uploads/<?= $chooseUs['ico'] ?>" alt>
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