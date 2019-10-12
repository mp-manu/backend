<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 08.10.2019
 * Time: 0:17
 */
$this->title = 'Спасибо';
?>
<div class="content__thanks">
    <section class="thanks">
        <div class="thanks__container container">
            <header class="thanks__header"><h1 class="thanks__title"><?= $sectionThanks['title'] ?></h1>
                <p class="thanks__caption"><?= $sectionThanks['description'] ?></p></header>
            <footer class="thanks__footer">
                <div class="not-found__button">
                    <button class="button is-wide is-large" data-modal="thanks"><?= $sectionThanks['alias'] ?>
                    </button>
                </div>
            </footer>
        </div>
    </section>
</div>
