<?php

namespace app\assets\admin;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'admin_assets/css/site.css',
    /*-- google font --*/
        'admin_assets/fonts/poppins/poppins.css',
    /*-- icons --*/
        'admin_assets/fonts/font-awesome/css/font-awesome.min.css',
        'admin_assets/fonts/material-design-icons/material-icon.css',
    /*--bootstrap --*/
        //'plugins/bootstrap/css/bootstrap.min.css',

        'admin_assets/css/pages/extra_pages.css',
    ];
    public $js = [
    /*-- start js include path --*/
        //'plugins/jquery/jquery.min.js',
        'admin_assets/js/pages/extra-pages/pages.js',
    /*-- end js include path --*/
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
