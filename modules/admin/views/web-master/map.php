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
$this->registerJsFile("//api-maps.yandex.ru/2.1/?lang=ru_RU");
?>
<?php $form = ActiveForm::begin() ?>
<div class="row">
    <div class="col-xs-12">
       <?= $form->field($model, 'center1', ['options' => ['class' => false], 'template' => '{input}'])->hiddenInput() ?>
       <?= $form->field($model, 'center2', ['options' => ['class' => false], 'template' => '{input}'])->hiddenInput() ?>
       <?php $code = <<<EOT
ymaps.ready(function() {
    var latitude = $('#companymap-center1').val();
    var longitude = $('#companymap-center2').val();
    init(latitude, longitude);
});
jQuery('#companymap-center1, #companymap-center2').on('change', function() {
    var latitude = jQuery('#companymap-center1').val();
    var longitude = jQuery('#companymap-center2').val();
    ymaps.ready(init(latitude, longitude));
});

function init(latitude, longitude) {
    jQuery('#map').empty();
    var myMap = new ymaps.Map("map", {
        center: [latitude, longitude],
        zoom: 13
    }),

    myGeoObject = new ymaps.GeoObject({
        geometry: {
            type: "Point",
            coordinates: [latitude, longitude]
        },
    }, {
        iconLayout: 'default#image',
        draggable: true
    });

    myGeoObject.events.add(['dragend'], function (e) {
        coords = this.geometry.getCoordinates();
        jQuery('#companymap-center1').val(coords[0].toFixed(6));
        jQuery('#companymap-center2').val(coords[1].toFixed(6));
    }, myGeoObject);

    myMap.geoObjects.add(myGeoObject);
    myMap.behaviors.disable('scrollZoom');
    myMap.behaviors.disable('multiTouch');
}
EOT;
       $this->registerJs($code, View::POS_END); ?>
        <div id="map" style="width:100%"></div>
    </div>
</div>
<?php ActiveForm::end() ?>
