<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * 前台主要资源文件
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/font-awesome.min.css',
        'css/materialize.min.css',
        'css/slick.css',
        'css/slick-theme.css',
        'css/owl.carousel.css',
        'css/owl.theme.css',
        'css/owl.transitions.css',
        'css/lightbox.min.css',
        'css/style.css',
    ];
    public $js = [
        'js/jquery.min.js',
        'js/materialize.min.js',
        'js/slick.min.js',
        'js/owl.carousel.min.js',
        'js/custom-portfolio.js',
        'js/jquery.filterizr.min.js',
        'js/lightbox.min.js',
        'js/custom.js',
    ];
    public $depends = [
    ];
}
