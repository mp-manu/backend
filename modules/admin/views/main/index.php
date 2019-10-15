<?php

/* @var $this yii\web\View */

$this->title = 'Панель администратора';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['/']];

?>
<?= $this->render('/layouts/page-bar') ?>
    <!-- start widget -->

    <div class="state-overview">
        <div class="row">
            <div class="col-xl-4 col-md-4 col-12">
                <div class="info-box bg-b-green">
                    <span class="info-box-icon push-bottom"><i class="fa fa-file"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Заказы по чертежу</span>
                        <span class="info-box-number"><?= $orderByDraws ?></span>
                        <span class="progress-description">
                        <a href="/admin/user/order-by-draws" class="text-white" target="_blank">Подробнее. . .</a>
					</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-xl-4 col-md-4 col-12">
                <div class="info-box bg-b-yellow">
                    <span class="info-box-icon push-bottom"><i class="fa fa-phone"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Запрос на званок</span>
                        <span class="info-box-number"><?= $calls ?></span>
                        <span class="progress-description">
                        <a href="/admin/user/call-requests" class="text-white" target="_blank">Подробнее. . .</a>
					</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-xl-4 col-md-4 col-12">
                <div class="info-box bg-b-blue">
                    <span class="info-box-icon push-bottom"><i class="fa fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Сообщения</span>
                        <span class="info-box-number"><?= $contacts ?></span>
                        <span class="progress-description">
                        <a href="/admin/user/contacts" class="text-white" target="_blank">Подробнее. . .</a>
					</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
    </div>
    <!-- end widget -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card  card-box">
                <div class="card-head">
                    <header>Список заказов на звонок</header>
                    <div class="tools">
                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table display product-overview mb-30" id="support_table">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Имя пользователя</th>
                                    <th>Телефон</th>
                                    <th>Время заказа</th>
                                    <th>Статус</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php if (!empty($callRequests)): $i = 0;
                                    foreach ($callRequests as $draw): $i++; ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $draw['name'] ?></td>
                                            <td><?= $draw['phone_number'] ?></td>
                                            <td>
                                                <?php
                                                $format = explode('-', $draw['d']);
                                                echo $format[2] . '-' . $format[1] . '-' . $format[0] . ' ' . $draw['t'];

                                                ?>
                                            </td>
                                            <td>
                                                <?php if ($draw['st'] == 1) {
                                                    echo '<span class="label label-md label-warning" 
                                                data-id="' . $draw['call_id'] . '" data-text="' . $draw['st'] . '" onclick="f(this);">
                                                        В ожидании
                                                      </span>';
                                                } elseif ($draw['st'] == 0) {
                                                    echo '<span class="label label-md label-success" 
                                                data-id="' . $draw['call_id'] . '" data-text="' . $draw['st'] . '" onclick="f(this);">
                                                        Выполнено
                                                      </span>';
                                                } else {
                                                    echo '<span class="label label-md label-danger" 
                                                data-id="' . $draw['call_id'] . '" data-text="' . $draw['st'] . '" onclick="f(this);">
                                                        Отказано
                                                      </span>';
                                                }
                                                ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .label {
            cursor: pointer;
        }
    </style>
<?= $this->registerJsFile('@web/admin_assets/js/main.js'); ?>