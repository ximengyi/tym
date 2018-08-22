<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use app\common\services\UrlService;
/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MAsset extends AssetBundle
{

   // public  $release_version = RELEASE_VERSION;

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    // public $css = [
    //   'font-awesome/css/font-awesome.css',
    //   'css/m/css_style.css',
    //   '/css/m/app.css?ver='.time(),
    // ];
    // public $js = [
    //   "plugins/jquery-2.1.1.js",
    //   "js/m/TouchSlide.1.1.js",
    //  "js/m/common.js?ver=".RELEASE_VERSION
    // ];
    //
    // public $depends = [
    //     'yii\web\YiiAsset',
    //     'yii\bootstrap\BootstrapAsset',
    // ];

    public function registerAssetFiles( $view ){
        //加一个版本号,目的 ： 是浏览器获取最新的css 和 js 文件
        $release_version = defined("RELEASE_VERSION") ? RELEASE_VERSION:time();
        $this->css = [
            UrlService::buildWwwUrl( "/font-awesome/css/font-awesome.css" ),
            UrlService::buildWwwUrl( "/css/m/css_style.css"),
            UrlService::buildWwwUrl( "/css/m/app.css",[ 'ver' => $release_version ] )
        ];
        $this->js = [
            UrlService::buildWwwUrl( "/plugins/jquery-2.1.1.js"),
            UrlService::buildWwwUrl( "/js/m/TouchSlide.1.1.js"),
            UrlService::buildWwwUrl( "/js/web/common.js",[ 'ver' => $release_version ] ),

            //------------------------------------------>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
            //  UrlService::buildWwwUrl( "/js/web/common.js",[ 'ver' => $release_version ] ),
        ];
        parent::registerAssetFiles( $view );
    }

}
