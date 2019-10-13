<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 11.10.2019
 * Time: 22:17
 */

use yii\helpers\Html;

$this->title = 'Сообщение пользователей';

?>

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
            <div class="table-scrollable">
                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                       id="example4">
                    <thead>
                    <tr>
                        <th> №</th>
                        <th> Имя</th>
                        <th> Номер телефона</th>
                        <th> Email</th>
                        <th> Дата отправки</th>
                        <th> Статус</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;
                    foreach ($contacts as $contact): $i += 1; ?>
                        <tr class="odd gradeX">
                            <td class="left"><?= $i ?></td>
                            <td><?= $contact['name'] ?></td>
                            <td class="left"><?= $contact['phone_number'] ?></td>
                            <td><?= $contact['email'] ?></td>
                            <td class="left">
                                <?= $contact['created_at'] ?>
                            </td>
                            <td>
                                <?php if ($contact['status'] == 1) {
                                    echo '<span class="label label-md label-warning" 
                                                data-id="' . $contact['contact_id'] . '" data-text="' . $contact['status'] . '" onclick="contact(this);">
                                                        В ожидании
                                                      </span>';
                                } elseif ($contact['status'] == 0) {
                                    echo '<span class="label label-md label-success" 
                                                data-id="' . $contact['contact_id'] . '" data-text="' . $contact['status'] . '" onclick="contact(this);">
                                                        Прочитано
                                                      </span>';
                                } else {
                                    echo '<span class="label label-md label-danger" 
                                                data-id="' . $contact['contact_id'] . '" data-text="' . $contact['status'] . '" onclick="contact(this);">
                                                        Отказано
                                                      </span>';
                                }
                                ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>
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

$this->registerJsFile('@web/admin_assets/js/main.js');
?>
<style>
    .label {
        cursor: pointer;
    }
</style>
