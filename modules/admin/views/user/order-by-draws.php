<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 11.10.2019
 * Time: 22:17
 */

use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\web\JqueryAsset;

$this->title = 'Заказы по чертежу';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('/layouts/page-bar') ?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-box">
            <div class="card-head">
                <header><?= $this->title ?></header>
            </div>
            <div class="card-body ">
                <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                           id="example4">
                        <thead>
                        <tr>
                            <th> №</th>
                            <th> Имя</th>
                            <th> Номер телефона</th>
                            <th> Файл</th>
                            <th> Дата заказа</th>
                            <th> Статус</th>
                            <th> Скачать файл</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($orders)): ?>
                            <?php $i = 0;
                            foreach ($orders as $order): $i++; ?>
                                <tr class="odd gradeX">
                                    <td class="left">
                                        <?= $i ?>
                                    </td>
                                    <td class="left">
                                        <?= $order['name'] ?>
                                    </td>
                                    <td class="left">
                                        <?= $order['phone_number'] ?>
                                    </td>
                                    <td class="left">
                                        <a href="<?= Yii::getAlias('@web') . '/uploads/draw-orders/' . $order['file'] ?>"><img src="<?= Yii::getAlias('@web') . '/uploads/draw-orders/' . $order['file'] ?>" width="180"></a>
                                    </td>
                                    <td class="left">
                                        <?php
                                        $format = explode('-', $order['d']);
                                        echo $format[2] . '-' . $format[1] . '-' . $format[0] . ' ' . $order['t'];
                                        ?>
                                    </td>
                                    <td class="left">
                                        <?php if ($order['st'] == 1) {
                                            echo '<span class="label label-md label-warning" 
                                                data-id="' . $order['order_id'] . '" data-text="' . $order['st'] . '" onclick="order(this);">
                                                        В ожидании
                                                      </span>';
                                        } elseif ($order['st'] == 0) {
                                            echo '<span class="label label-md label-success" 
                                                data-id="' . $order['order_id'] . '" data-text="' . $order['st'] . '" onclick="order(this);">
                                                        Выполнено
                                                      </span>';
                                        } else {
                                            echo '<span class="label label-md label-danger" 
                                                data-id="' . $order['order_id'] . '" data-text="' . $order['st'] . '" onclick="order(this);">
                                                        Отказано
                                                      </span>';
                                        }
                                        ?>
                                    </td>
                                    <td class="left">
                                        <a href="<?= Yii::getAlias('@web') . '/uploads/draw-orders/' . $order['file'] ?>" class="btn btn-info"
                                           download="<?= $order['file'] ?>">Скачать файл</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->registerCssFile('@web/admin_assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css', [
    'depends' => [
        BootstrapAsset::className()
    ]
]);
$this->registerJsFile('@web/admin_assets/plugins/datatables/jquery.dataTables.min.js', [
    'depends' => [
        JqueryAsset::className()
    ]
]);
$this->registerJsFile('@web/admin_assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js', [
    'depends' => [
        JqueryAsset::className()
    ]
]);
$this->registerJsFile('@web/admin_assets/js/pages/table/table_data.js', [
    'depends' => [
        JqueryAsset::className()
    ]
]);

?>

<style>
    .label {
        cursor: pointer;
    }
</style>
<?= $this->registerJsFile('@web/admin_assets/js/main.js'); ?>
