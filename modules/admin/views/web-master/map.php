<?php
/**
 * Created by PhpStorm.
 * User: IT_User-144
 * Date: 23.10.2019
 * Time: 15:00
 */

use yii\web\View;
use yii\widgets\ActiveForm;

$this->title = 'Указать адрес на карте';


$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile("https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=0acb31df-3471-43c3-a78e-f015209ec803");
?>

<?= $this->render('/layouts/page-bar') ?>
<?php $form = ActiveForm::begin() ?>
<div class="row">
    <div class="col-lg-12">
       <?= $form->field($model, 'center1', ['options' => ['class' => false], 'template' => '{input}'])->hiddenInput() ?>
       <?= $form->field($model, 'center2', ['options' => ['class' => false], 'template' => '{input}'])->hiddenInput() ?>
       <?php
       $code = <<<EOT
        ymaps.ready(function() {
            var latitude = $('#companymap-center1').val();
            var longitude = $('#companymap-center2').val();
            init(latitude, longitude);
        });
       function init (latitude, longitude) {
        myMap = new ymaps.Map("map", {
        center: [latitude, longitude],
        zoom: 13
        }, {
        balloonMaxWidth: 200,
        searchControlProvider: 'yandex#search'
        });
        myMap.events.add('click', function (e) {
            if (!myMap.balloon.isOpen()) {
                var coords = e.get('coords');
                $.ajax({
                type: "POST",
                url: '/admin/web-master/change-coords',
                data: {latitude: coords[0], longitude: coords[1]},
                    success: function(responese){
                        myMap.balloon.open(coords, {
                        contentHeader:'Сохранено!',
                        contentBody:'<p>Кто-то щелкнул по карте.</p>' +
                            '<p style="color: green">Координаты успешно сохранены!</p>',
                        contentFooter:'<sup>Щелкните еще раз</sup>'
                        });
                        $('#companymap-center1').val(coords[0]);
                        $('#companymap-center2').val(coords[1]); 
                    }
             });
            }
            else {
                myMap.balloon.close();
            }
        });
    
        // Обработка события, возникающего при щелчке
        // правой кнопки мыши в любой точке карты.
        // При возникновении такого события покажем всплывающую подсказку
        // в точке щелчка.
        myMap.events.add('contextmenu', function (e) {
            myMap.hint.open(e.get('coords'), 'Кто-то щелкнул правой кнопкой');
        });
        
        // Скрываем хинт при открытии балуна.
        myMap.events.add('balloonopen', function (e) {
            myMap.hint.close();
        });
        
        
}
EOT;
       $this->registerJs($code, View::POS_END); ?>
        <div id="map" style="width:100%; height: 550px; border: 1px solid gray; margin-bottom: 50px"></div>
    </div>
</div>
<?php ActiveForm::end() ?>
