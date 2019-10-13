<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 11.10.2019
 * Time: 22:17
 */

use yii\helpers\Html;

$this->title = 'Вопросы пользователей';

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
                <div class="card-body ">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                               id="example4">
                            <thead>
                            <tr>
                                <th> №</th>
                                <th> Имя</th>
                                <th> Телефон</th>
                                <th> Вопрос</th>
                                <th> Ответ</th>
                                <th> Статус</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=0; foreach ($question as $q): $i+=1; ?>
                                <tr class="odd gradeX">
                                    <td class="left"><?= $i ?></td>
                                    <td class="left"><?= $q['username'] ?></td>
                                    <td><?= $q['phone'] ?></td>
                                    <td class="left">
                                            <?= $q['question'] ?>
                                    </td>
                                    <td>
                                        <?php $readonly = ($q['status'] == 0 || $q['status'] == 2) ? 'readonly' : '' ?>
                                        <textarea id="answer" <?=$readonly?>><?= $q['answer'] ?></textarea>
                                    </td>
                                    <td class="left">
                                        <?php if ($q['status'] == 1) {
                                            echo '<span class="label label-md label-warning" 
                                                data-id="'.$q['id'].'" data-text="'.$q['status'].'" onclick="question(this);">
                                                        В ожидании
                                                      </span>';
                                        } elseif ($q['st'] == 0) {
                                            echo '<span class="label label-md label-success" 
                                                data-id="'.$q['id'].'" data-text="'.$q['status'].'" onclick="question(this);">
                                                        Выполнено
                                                      </span>';
                                        } else {
                                            echo '<span class="label label-md label-danger" 
                                                data-id="'.$q['id'].'" data-text="'.$q['status'].'" onclick="question(this);">
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

?>


<style>
    .label{
        cursor: pointer;
    }
</style>
<?= $this->registerJsFile('@web/admin_assets/js/main.js'); ?>
