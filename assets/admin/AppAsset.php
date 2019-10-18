<?php

namespace app\assets\admin;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'admin_assets/css/site.css',
    /*-- google font --*/
        'admin_assets/fonts/poppins/poppins.css',
    /*-- icons --*/
        'admin_assets/fonts/simple-line-icons/simple-line-icons.min.css',
        'admin_assets/fonts/font-awesome/font-awesome.css',
        'admin_assets/fonts/material-design-icons/material-icon.css',
    /*--bootstrap --*/
        //'admin_assets/plugins/bootstrap/css/bootstrap.min.css',
        'admin_assets/plugins/summernote/summernote.css',
    /*-- Material Design Lite CSS --*/
        'admin_assets/plugins/material/material.min.css',
        'admin_assets/css/material_style.css',
    /*-- inbox style --*/
        //'admin_assets/css/pages/inbox.min.css',
    /*-- Theme Styles --*/
        'admin_assets/css/theme/light/theme_style.css',
        'admin_assets/css/plugins.min.css',
        'admin_assets/css/theme/light/style.css',
        'admin_assets/css/responsive.css',
        'admin_assets/css/theme/light/theme-color.css',
    ];
    public $js = [
    /*-- start js include path --*/
        //'plugins/jquery/jquery.min.js',
        'admin_assets/plugins/popper/popper.js',
        'admin_assets/plugins/jquery-blockui/jquery.blockui.min.js',
	    'admin_assets/plugins/jquery-slimscroll/jquery.slimscroll.js',
    /*-- bootstrap --*/
        //'admin_assets/plugins/bootstrap/js/bootstrap.min.js',
        //'admin_assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
        //'admin_assets/plugins/sparkline/jquery.sparkline.js',
	    //'admin_assets/js/pages/sparkline/sparkline-data.js',
    /*-- Common js--*/
	    'admin_assets/js/app.js',
        'admin_assets/js/layout.js',
        //'admin_assets/js/theme-color.js',
    /*-- material --*/
        'admin_assets/plugins/material/material.min.js',
    /*-- chart js --*/
        //'admin_assets/plugins/chart-js/Chart.bundle.js',
        //'admin_assets/plugins/chart-js/utils.js',
        //'admin_assets/js/pages/chart/chartjs/home-data.js',
    /*-- summernote --*/
        //'admin_assets/plugins/summernote/summernote.js',
        //'admin_assets/js/pages/summernote/summernote-data.js',
    /*-- end js include path --*/
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
