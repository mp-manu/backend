<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 11.10.2019
 * Time: 22:17
 */

use yii\helpers\Html;

$this->title = 'Список пользователей';

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
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="btn-group">
                                <a href="/admin/user/create" id="addRow" class="btn btn-info">
                                    Добавить<i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                               id="example4">
                            <thead>
                            <tr>
                                <th></th>
                                <th> UID</th>
                                <th> Логин</th>
                                <th> Email</th>
                                <th> Тип</th>
                                <th> Статус</th>
                                <th> Дата регистрации</th>
                                <th> Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr class="odd gradeX">
                                    <td class="patient-img">
                                        <img src="/admin_assets/img/prof/<?= $user['avatar'] ?>" alt="">
                                    </td>
                                    <td class="left"><?= $user['user_id'] ?></td>
                                    <td><?= $user['username'] ?></td>
                                    <td class="left"><a href="mailto:<?= $user['email'] ?>">
                                            <?= $user['email'] ?> </a></td>
                                    <td> <?php
                                        switch ($user['user_type']) {
                                            case 'A':
                                                echo 'Администратор';
                                                break;
                                            case 'U':
                                                echo 'Пользователь';
                                                break;
                                            case 'E':
                                                echo 'Сотрудник';
                                                break;
                                        }

                                        ?></td>
                                    <td class="left">
                                       <?= ($user['is_block'] == 0) ? 'Включён' : 'Отключён' ?>
                                    </td>
                                    <td>
                                        <?= $user['created_at'] ?>
                                    </td>
                                    <td>
                                        <a href="/admin/user/update?id=<?= $user['user_id'] ?>"
                                           class="btn btn-primary btn-xs">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <?= Html::a('<i class="fa fa-trash-o "></i>', ['delete', 'id' => $user['user_id']], [
                                            'class' => 'btn btn-danger btn-xs',
                                            'data' => [
                                                'confirm' => 'Вы уверены что хотите удалить этот запись?',
                                                'method' => 'post',
                                            ],
                                        ]) ?>
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