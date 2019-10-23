<?php
/**
 * Created by PhpStorm.
 * User: IT_User-144
 * Date: 23.10.2019
 * Time: 10:52
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Элементы вебмастера';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('/layouts/page-bar') ?>
<?php if (\Yii::$app->session->hasFlash('success')) : ?>
    <div class="alert alert-success alert-dismissible" style="margin-top: 5%;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
       <?php echo \Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?>
<?php if (\Yii::$app->session->hasFlash('error')) : ?>
    <div class="alert alert-danger alert-dismissible" style="margin-top: 5%;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
       <?php echo \Yii::$app->session->getFlash('error'); ?>
    </div>
<?php endif; ?>
<div class="row">
   <div class="col-md-12">
       <a class="btn btn-success btn-sm" href="/admin/web-master/meta-tags-and-yametrika-scripts-add">Добавить</a>
      <div class="card card-box">
         <div class="card-head">
            <header><?= $this->title ?></header>
            <div class="tools">
               <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
               <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
               <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
            </div>
         </div>
         <div class="card-body">
             <div class="table-scrollable">
                 <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                        id="example4">
                     <thead>
                     <tr>
                         <th> №</th>
                         <th> Метатеги</th>
                         <th> Код</th>
                         <th> Статус</th>
                     </tr>
                     </thead>
                     <tbody>
                     <?php if(!empty($data)): ?>
                        <?php $i=0; foreach($data as $d): $i+=1; ?>
                             <tr class="odd gradeX">
                                 <td class="left"><?= $i ?></td>
                                 <td class="left"><textarea rows="10" cols="60"><?= $d['tags'] ?></textarea></td>
                                 <td><textarea rows="10" cols="60"><?= $d['scripts'] ?></textarea></td>
                                 <td class="left">
                                     <?php
                                     if($d['status'] == 1){
                                         echo '<a class="btn btn-success btn-sm" data-id="'. $d['id'] .'" title="Статус">Активный</a>';
                                     }else{
                                        echo '<a class="btn btn-danger btn-sm" data-id="'. $d['id'] .'" title="Статус">Выключен</a>';
                                     }
                                     ?>
                                     <br><br><a class="btn btn-info btn-sm" title="Статус" href="/admin/web-master/meta-tags-and-yametrika-scripts-edit?id=<?= $d['id'] ?>">
                                         <i class="fa fa-pencil"></i></a>
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