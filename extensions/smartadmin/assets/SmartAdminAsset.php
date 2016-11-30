<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\extensions\smartadmin\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SmartAdminAsset extends AssetBundle
{
    public $sourcePath = '@app/extensions/smartadmin/web';
    public $css = [
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/invoice.min.css',
        'css/lockscreen.min.css',
        'css/smartadmin-production.min.css',
        'css/smartadmin-production-plugins.min.css',
        'css/smartadmin-rtl.min.css',
        'css/smartadmin-skins.min.css',
        'css/style.css',
    ];
    public $js = [
       // 'js/libs/jquery-2.1.1.min.js',
        'js/libs/jquery-ui-1.10.3.min.js',
        'js/app.config.js',
        'js/plugin/jquery-touch/jquery.ui.touch-punch.min.js',
        'js/bootstrap/bootstrap.min.js',
        'js/notification/SmartNotification.min.js',
        'js/smartwidgets/jarvis.widget.min.js',
        'js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js',
        'js/plugin/sparkline/jquery.sparkline.min.js',
        'js/plugin/jquery-validate/jquery.validate.min.js',
        'js/plugin/masked-input/jquery.maskedinput.min.js',
        'js/plugin/select2/select2.min.js',
        'js/plugin/bootstrap-slider/bootstrap-slider.min.js',
        'js/plugin/msie-fix/jquery.mb.browser.min.js',
        'js/plugin/fastclick/fastclick.min.js',
       // 'js/demo.min.js',
        'js/app.min.js',

    /* ENHANCEMENT PLUGINS : NOT A REQUIREMENT */
        'js/speech/voicecommand.min.js',

        'js/plugin/summernote/summernote.min.js',

		/* SmartChat UI : plugin */
		//'js/smart-chat-ui/smart.chat.ui.min.js',
		//'js/smart-chat-ui/smart.chat.manager.min.js',

		/* PAGE RELATED PLUGIN(S) */
		'js/plugin/datatables/jquery.dataTables.min.js',
		'js/plugin/datatables/dataTables.colVis.min.js',
		'js/plugin/datatables/dataTables.tableTools.min.js',
		'js/plugin/datatables/dataTables.bootstrap.min.js',
		'js/plugin/datatable-responsive/datatables.responsive.min.js',

        //Don't Remove !
        'js/globalfunc.js',
    ];
//    public $publishOptions = [
//        'forceCopy'=>true,
//    ];
    public $depends = [
        'yii\web\YiiAsset',
       // 'yii\bootstrap\BootstrapAsset',
    ];
}
