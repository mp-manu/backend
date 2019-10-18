<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 11.10.2019
 * Time: 22:17
 */

use yii\helpers\Html;

$this->title = 'Заказы на звонок';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('/layouts/page-bar') ?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-box">
            <div class="card-head">
                <header><?= $this->title ?></header>
                <div class="tools">
                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                </div>
            </div>
            <div class="card-body ">
                <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                           id="example4">
                        <thead>
                        <tr>
                            <th> Имя</th>
                            <th> Телефон</th>
                            <th> Время заказа звонка</th>
                            <th> Статус</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($data)): ?>
                            <?php foreach ($data as $call): ?>
                                <tr class="odd gradeX">
                                    <td class="left"><?= $call['name'] ?></td>
                                    <td><?= $call['phone_number'] ?></td>
                                    <td class="left">
                                        <?php
                                        $format = explode('-', $call['d']);
                                        echo $format[2] . '-' . $format[1] . '-' . $format[0] . ' ' . $call['t'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($call['st'] == 1) {
                                            echo '<span class="label label-md label-warning" 
                                                data-id="' . $call['call_id'] . '" data-text="' . $call['st'] . '" onclick="f(this);">
                                                        В ожидании
                                                      </span>';
                                        } elseif ($call['st'] == 0) {
                                            echo '<span class="label label-md label-success" 
                                                data-id="' . $call['call_id'] . '" data-text="' . $call['st'] . '" onclick="f(this);">
                                                        Выполнено
                                                      </span>';
                                        } else {
                                            echo '<span class="label label-md label-danger" 
                                                data-id="' . $call['call_id'] . '" data-text="' . $call['st'] . '" onclick="f(this);">
                                                        Отказано
                                                      </span>';
                                        }
                                        ?>
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
        \yii\bootstrap\BootstrapAsset::className()
    ]
]);
$this->registerJsFile('@web/admin_assets/plugins/datatables/jquery.dataTables.min.js', [
    'depends' => [
        \yii\web\JqueryAsset::className()
    ]
]);
$this->registerJsFile('@web/admin_assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js', [
    'depends' => [
        \yii\web\JqueryAsset::className()
    ]
]);
$this->registerJsFile('@web/admin_assets/js/pages/table/table_data.js', [
    'depends' => [
        \yii\web\JqueryAsset::className()
    ]
]);

?>
<style>
    .label {
        cursor: pointer;
    }
</style>
<?= $this->registerJsFile('@web/admin_assets/js/main.js'); ?>
