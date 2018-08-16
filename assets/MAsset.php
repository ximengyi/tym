<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    // public $css = [
    //   'font-awesome/css/font-awesome.css',
    //   'css/m/css_style.css',
    //   '/css/m/app.css?ver=20170401'.RELEASE_VERSION
    // ];
    // public $js = [
    //   "plugins/jquery-2.1.1.js",
    //   "js/m/TouchSlide.1.1.js",
    //   "js/m/common.js?ver=".RELEASE_VERSION
    // ];

    // public $depends = [
    //     'yii\web\YiiAsset',
    //     'yii\bootstrap\BootstrapAsset',
    // ];

}
