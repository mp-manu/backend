<?php
/**
 * Created by PhpStorm.
 * User: Manuchehr
 * Date: 13.10.2019
 * Time: 0:48
 */
$this->title = 'Профиль ' . $user['username'];
?>
<?php if (\Yii::$app->session->hasFlash('errorRetype')) : ?>
    <div class="alert alert-danger alert-dismissible" style="margin-top: 5%;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <?php echo \Yii::$app->session->getFlash('errorRetype'); ?>
    </div>
<?php endif; ?>
<?php if (\Yii::$app->session->hasFlash('success')) : ?>
    <div class="alert alert-success alert-dismissible" style="margin-top: 5%;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <?php echo \Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?>
<div class="col-md-6 col-md-offset-3">
    <div class="card card-topline-aqua">
        <div class="card-body no-padding height-9">
            <div class="row">

                <div class="profile-userpic">
                    <img src="<?= Yii::getAlias('@web') . '/admin_assets/img/prof/' . $user['avatar'] ?>"
                         class="img-responsive" alt=""></div>
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name"><?= $user['username'] ?></div>
                <div class="profile-usertitle-job">
                    <?php
                    if ($user['user_type'] == 'A') {
                        echo 'Администратор';
                    } elseif ($user['user_type'] == 'E') {
                        echo 'Сотрудник';
                    } else {
                        echo 'Сотрудник';
                    }
                    ?>
                </div>
            </div>
            <form method="post" action="/admin/user/change-password">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Статус</b> <a class="pull-right">
                            <?php
                            if ($user['is_block'] == 0) {
                                echo 'Активный';
                            } else {
                                echo 'Заблокирован';
                            }
                            ?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Новый логин:</b> <input type="text" name="username">
                    </li>
                    <li class="list-group-item">
                        <b>Новый пароль:</b> <input type="password" name="user_password" required="true">
                    </li>
                    <li class="list-group-item">
                        <b>Подтвердить пароль:</b> <input type="password" name="confirm_password" required="true">
                    </li>
                </ul>

                <div class="profile-userbuttons">
                    <button type="submit" class="btn btn-circle green btn-sm">Сохранить</button>
                    <a type="button" class="btn btn-circle red btn-sm" href="/admin">Назад</a>
                </div>
            </form>
            <!-- END SIDEBAR BUTTONS -->
        </div>
    </div>
</div>
