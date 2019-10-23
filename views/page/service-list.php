<?php
/**
 * Created by PhpStorm.
 * User: IT_User-144
 * Date: 23.10.2019
 * Time: 9:39
 */
$this->title = 'Услуги компании ТехАрсенал';
?>
<div class="content__headline">
    <header class="headline">
        <div class="container">
            <div class="grid is-row">
                <div class="col-7">
                    <div class="headline__body">
                        <div class="headline__breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb__item">
                                    <a href="/index.html" title="Главная" class="breadcrumb__link">Главная</a>
                                </li>
                            </ul>
                        </div>
                        <h1 class="headline__title title">
                           <?= Yii::$app->settings->get('Услуги', 'услуги_компании_техарсенал') ?>
                        </h1>
                        <div class="headline__descr text">
                           <?= Yii::$app->settings->get('Услуги', 'описание') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
<!------------SERVICE LIST-------------------->
<?php if(!empty($services)): ?>
<div class="content__body">
    <div class="content__section">
        <section class="section">
            <div class="container">
                <div class="section__body">
                    <div class="services">
                        <ul class="services__list grid is-columns">
                            <?php foreach ($services as $service): ?>
                            <li class="services__item col-3 col-4">
                                <article class="service">
                                    <figure class="service__cover">
                                        <img src="<?= Yii::getAlias('@uploads').'/services/'.$service['img'] ?>" alt="<?= $service['name'] ?>" class="service__image">
                                    </figure>
                                    <div class="service__body"><img src="<?= Yii::getAlias('@web').'/img/service-ico-'.rand(1, 6).'.svg' ?>" alt="" class="service__icon">
                                        <h4 class="service__title">
                                            <a href="<?= '/page/service/'.$service['alias'] ?>" class="service__link"><?= $service['name'] ?></a>
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
</div>
<?php endif; ?>
<!------------END SERVICE LIST-------------------->