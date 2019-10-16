<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 08.10.2019
 * Time: 21:55
 */
?>
<?php if (!empty($service)): ?>
    <div class="content__headline">
        <header class="headline has-cover">
            <div class="headline__cover" style="background-image: url(/uploads/services/<?= $service['img'] ?>)"></div>
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
                                                                    href="/page/service?id=<?=$service['id  ']?>" title="Услуги">Услуги</a>
                                    </li>
                                </ul>
                            </div>
                            <h1 class="headline__title title"><?= $service['name'] ?></h1>
                            <div class="headline__list">
                                <ul class="list is-light">
                                    <?php
                                    if (substr($service['description'], -1) == '.') {
                                        $service['description'] = substr_replace($service['description'], "", -1);
                                    }
                                    $description = explode('.', $service['description']);
                                    if (!empty($description)):
                                        foreach ($description as $item): ?>
                                            <li class="list__item"><?= $item ?></li>
                                        <?php  endforeach; endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
<?php endif; ?>