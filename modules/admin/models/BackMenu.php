<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "back_menu".
 *
 * @property int $nodeid
 * @property int $parentnodeid
 * @property string $nodeshortname
 * @property string $nodename
 * @property string $nodeurl
 * @property string $userstatus
 * @property int $nodeaccess
 * @property int $nodestatus
 * @property int $nodeorder
 * @property string $service_id
 * @property string $nodefile
 * @property string $nodeicon
 * @property string $ishasdivider
 * @property string $hasnotify
 * @property string $notifyscript
 * @property string $isforguest
 */
class BackMenu extends \yii\db\ActiveRecord
{
   /**
    * {@inheritdoc}
    */
   public static function tableName()
   {
      return 'back_menu';
   }

   /**
    * {@inheritdoc}
    */
   public function rules()
   {
      return [
          [['parentnodeid', 'nodeshortname', 'nodename', 'nodeurl', 'nodeaccess', 'nodestatus', 'nodeorder'], 'required'],
          [['parentnodeid', 'nodeaccess', 'nodestatus', 'nodeorder'], 'integer'],
          [['ishasdivider', 'hasnotify', 'isforguest'], 'string'],
          [['nodeshortname', 'nodeicon'], 'string', 'max' => 50],
          [['nodename'], 'string', 'max' => 100],
          [['nodeurl', 'nodefile', 'notifyscript'], 'string', 'max' => 255],
          [['userstatus'], 'string', 'max' => 10],
      ];
   }

   /**
    * {@inheritdoc}
    */
   public function attributeLabels()
   {
      return [
          'nodeid' => 'Nodeid',
          'parentnodeid' => 'Parentnodeid',
          'nodeshortname' => 'Nodeshortname',
          'nodename' => 'Nodename',
          'nodeurl' => 'Nodeurl',
          'userstatus' => 'Userstatus',
          'nodeaccess' => 'Nodeaccess',
          'nodestatus' => 'Nodestatus',
          'nodeorder' => 'Nodeorder',
          'nodefile' => 'Nodefile',
          'nodeicon' => 'Nodeicon',
          'ishasdivider' => 'Ishasdivider',
          'hasnotify' => 'Hasnotify',
          'notifyscript' => 'Notifyscript',
          'isforguest' => 'Isforguest',
      ];
   }

   public static function PrintToPage()
   {
      $menu = '';
      $service = Services::find()->where(['status' => 1])->asArray()->all();

      $parent0 = BackMenu::find()
          ->where(['parentnodeid' => 0, 'userstatus' => ['ALL'], 'nodeaccess' => 1])
          ->orderBy('nodeorder')->asArray()->all();
      $index = 0;
      if (!empty($parent0)) {
         foreach ($parent0 as $item0):
            $index += 1;
            if ($index == 2) {
               if (!empty($service)) {
                  $menu .= '<li class="nav-item">';
                  $menu .= '<a href="#" class="nav-link nav-toggle">
                            <i class="material-icons">beenhere</i>
                            <span class="title">Услуги</span><span class="arrow"></span></a>';
                  $menu .= '<ul class="sub-menu">';
                  $menu .= '<li class="nav-item">';
                  $menu .= '<a href="/admin/services/index" class="nav-link nav-toggle">';
                  $menu .= '<span class="title">Все услуги</span></a></li>';
                  $menu .= '<li class="nav-item">';
                  $menu .= '<a href="/admin/services/add" class="nav-link nav-toggle">';
                  $menu .= '<span class="title">Добавить услугу</span></a></li>';
                  $menu .= '<li class="nav-item">';
                  foreach ($service as $serv) {
                     $menu .= '<li class="nav-item">';
                     $menu .= '<a href="/admin/services/details?=' . $serv['id'] . '" class="nav-link nav-toggle">';
                     $menu .= '<span class="title">' . $serv['name'] . '</span></a></li>';
                  }
                  $menu .= '</ul>';
               }
               else{
                  $menu .= '<li class="nav-item">';
                  $menu .= '<a href="#" class="nav-link nav-toggle">
                            <i class="material-icons">beenhere</i>
                            <span class="title">Услуги</span><span class="arrow"></span></a>';
                  $menu .= '<ul class="sub-menu">';
                  $menu .= '<li class="nav-item">';
                  $menu .= '<a href="/admin/services/add" class="nav-link nav-toggle">';
                  $menu .= '<span class="title">Добавить новую услугу</span></a></li></ul></li>';
               }
            }
            $menu .= '<li class="nav-item">';
            $menu .= '<a href="' . $item0['nodeurl'] . '" class="nav-link nav-toggle">
                            <i class="material-icons">' . $item0['nodeicon'] . '</i>
                            <span class="title">' . $item0['nodename'] . '</span>' . $item0['notifyscript'];
            $menu .= '<span class="' . $item0['arrow_tag'] . '"></span></a>';
            $parent1 = BackMenu::find()->where(['parentnodeid' => $item0['nodeid'], 'userstatus' => ['ALL'], 'nodeaccess' => 1])
                ->orderBy('nodeorder')->asArray()->all();
            if (!empty($parent1)) {
               $menu .= '<ul class="sub-menu">';
               foreach ($parent1 as $item1) {
                  $menu .= '<li class="nav-item">';
                  $menu .= '<a href="' . $item1['nodeurl'] . '" class="nav-link nav-toggle">';
                  $menu .= '<i class="' . $item1['nodeicon'] . '"></i> ' . $item1['notifyscript'];;
                  $menu .= '<span class="title">' . $item1['nodename'] . '</span>';
                  $menu .= '<span class="' . $item1['arrow_tag'] . '"></span></a>';
                  $menu .= '</a>';
                  $parent2 = BackMenu::find()->where(['parentnodeid' => $item1['nodeid'], 'userstatus' => ['ALL'], 'nodeaccess' => 1])
                      ->orderBy('nodeorder')->asArray()->all();
                  if (!empty($parent2)) {
                     $menu .= '<ul class="sub-menu">';
                     foreach ($parent2 as $item2) {
                        $menu .= '<li class="nav-item">';
                        $menu .= '<a href="' . $item2['nodeurl'] . '" class="nav-link">';
                        $menu .= '<i class="' . $item2['nodeicon'] . '"></i> ' . $item2['notifyscript'];
                        $menu .= '<span class="title">' . $item2['nodename'] . '</span>';
                        $menu .= '<span class="' . $item2['arrow_tag'] . '"></span>';
                        $menu .= '</a></li>';
                     }
                     $menu .= '</ul>';
                  }
                  $menu .= '</li>';
               }
               $menu .= '</ul>';
            }
            $menu .= '</li>';
         endforeach;
         return $menu;
      } else {
         return '';
      }
   }
}
