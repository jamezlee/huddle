<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/animate.min.css',
        'css/material-design-iconic-font.min.css',
        'css/jquery.mCustomScrollbar.min.css',
        //eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        'js/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
        'css/style.css',
        'css/app.css',
        //'css/site.css',

        //'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',

    ];
    public $js = [
        //'js/jquery/dist/jquery.min.js',
        'js/tinymce/jquery.tinymce.min.js',
        'js/tinymce/tinymce.min.js',

        'js/bootstrap/dist/js/bootstrap.min.js',
        'js/page-loader.min.js',
        'js/moment/min/moment.min.js',
        'js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
        'js/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js',
        'js/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
        'js/app.min.js',
        'js/inc/actions.js',
        'js/inc/functions.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
