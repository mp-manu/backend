<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "front_menu".
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
 * @property string $nodefile
 * @property string $nodeicon
 * @property string $ishasdivider
 * @property string $hasnotify
 * @property string $notifyscript
 * @property string $isforguest
 * @property string $arrow_tag
 * @property string $position
 */
class FrontMenu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'front_menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parentnodeid', 'nodeshortname', 'nodename', 'nodeurl', 'nodeaccess', 'nodestatus', 'nodeorder'], 'required'],
            [['parentnodeid', 'nodeaccess', 'nodestatus', 'nodeorder'], 'integer'],
            [['ishasdivider', 'hasnotify', 'isforguest', 'position'], 'string'],
            [['nodeshortname', 'nodeicon'], 'string', 'max' => 50],
            [['nodename'], 'string', 'max' => 100],
            [['nodeurl', 'nodefile', 'notifyscript', 'arrow_tag'], 'string', 'max' => 255],
            [['userstatus'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nodeid' => 'Id',
            'parentnodeid' => 'Категория',
            'nodeshortname' => 'Алиас',
            'nodename' => 'Название',
            'nodeurl' => 'Ссылка',
            'userstatus' => 'Статус Пользователя',
            'nodeaccess' => 'Доступ',
            'nodestatus' => 'Статус меню',
            'nodeorder' => 'Сортировка',
            'nodefile' => 'Файл',
            'nodeicon' => 'Значок',
            'ishasdivider' => 'Ishasdivider',
            'hasnotify' => 'Hasnotify',
            'notifyscript' => 'Notifyscript',
            'isforguest' => 'Isforguest',
            'arrow_tag' => 'Arrow Tag',
            'position' => 'Position',
        ];
    }

    public static function  getItems(){
        $data = FrontMenu::find()->where(['nodeaccess' => 1])->asArray()->all();
        return $data;
    }
    public static function  getItemById($id){
        $data = FrontMenu::find()->where(['nodeaccess' => 1, 'nodeid' => $id])->asArray()->one();
        return $data['nodename'];
    }

    public static function PrintToHeader()
    {
        $menu = '';

        $parents = FrontMenu::find()->where(['parentnodeid' => 0, 'nodeaccess' => 1])
            ->orderBy('nodeorder ASC')->asArray()->all();
        if (!empty($parents)) {
            foreach ($parents as $parent) {
                $childs = FrontMenu::find()->where(['parentnodeid' => $parent['nodeid'], 'nodeaccess' => 1])
                    ->orderBy('nodeorder ASC')->asArray()->all();
                if (!empty($childs)) {
                    $menu .= '<li class="header-nav__item has-dropmenu">
                                <a class="header-nav__link" href="' . $parent['nodeurl'] . '" data-index="0"
                                @click.prevent="openDropmenu">' . $parent['nodename'] . '</a>
                                <div class="header-nav__dropmenu">
                                        <drop-menu inline-template ref="dropmenu0">
                                            <div class="drop-menu" v-on-clickaway="close"
                                                 :class="{ \'is-open\': opened }">
                                                <ul class="drop-menu__list">';
                    foreach ($childs as $child){
                        $menu .= '<li class="drop-menu__item"><a class="drop-menu__link"
                                        href="'.$child['nodeurl'].'">'.$child['nodename'].'</a></li>';
                    }
                    $menu .= '</ul></div></drop-menu></div></li>';
                }else{
                    $menu .= '<li class="header-nav__item"><a class="header-nav__link" href="'.$parent['nodeurl'].'"
                                                                data-index="1">'.$parent["nodename"].'</a></li>';
                }
            }
            return $menu;
        } else {
            return '';
        }
    }

    public static function PrintToFooter(){
        $footerMenu = '<div class="footer__links">
                            <div class="links">
                                <ul class="links__list">';
        $parents = FrontMenu::find()->where(['parentnodeid' => 0, 'nodeaccess' => 1])->andWhere('nodeid not in (2, 3)')
            ->orderBy('nodeorder ASC')->asArray()->all();
        if (!empty($parents)) {
            foreach ($parents as $parent) {
                $footerMenu .= '<li class="links__item"><a class="links__link"
                                                               href="'.$parent['nodeurl'].'">'.$parent['nodename'].'</a>';
                $childs = FrontMenu::find()->where(['parentnodeid' => $parent['nodeid'], 'nodeaccess' => 1])
                    ->orderBy('nodeorder ASC')->asArray()->all();
                if(!empty($childs)) {
                $footerMenu .= '<ul class="links__sublist">';
                    foreach ($childs as $child){
                        $footerMenu .=  '<li class="links__subitem"><a class="links__sublink"
                                                                          href="'.$child['nodeurl'].'">
                            '.$child['nodename'].'</a></li>';
                    }
                $footerMenu .= '</ul>';
                }
            }
        $footerMenu .= '</ul></div>
                       </div>';
        return $footerMenu;
        }else{
            return '';
        }
    }
}








