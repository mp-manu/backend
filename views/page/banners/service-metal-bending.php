<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 08.10.2019
 * Time: 21:55
 */
?>
<?php if(!empty($service)): ?>
<div class="content__headline">
    <header class="headline has-cover">
        <div class="headline__cover" style="background-image: url(/img/services/<?= $service['img'] ?>)"></div>
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
                                                                href="/page/service-metal-bending" title="Услуги">Услуги</a>
                                </li>
                            </ul>
                        </div>
                        <h1 class="headline__title title"><?= $service['name'] ?></h1>
                        <?php
                            if (substr($service['description'], -1) == '.') {
                                $service['description'] = substr_replace($service['description'], "", -1);
                            }
                            $description = explode('.', $service['description']);
                            if (!empty($description)):
                                echo '<p class="headline__subtitle">'. $description[0] .'</p>';
                                unset($description[0]);
                            foreach ($description as $item): ?>
                                <div class="headline__descr text"><p><?= $item ?></p></div>
                            <?php  endforeach; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
<?php endif; ?>