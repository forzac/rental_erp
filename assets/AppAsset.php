<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'libs/magnific-popup/magnific-popup.css',
        'libs/slick/slick.css',
        'css/main.css',
        'libs/animate/animate.min.css',
    ];
    public $js = [
        'libs/modernizr-2.8.3.min.js',
        'libs/magnific-popup/jquery.magnific-popup.min.js',
        'libs/slick/slick.js',
        'libs/jquery.easing.min.js',
        'libs/jquery.animateNumber.min.js',
        'libs/device.js',
        'libs/waypoints/waypoints.min.js',
        'js/main.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
