<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace svsoft\yii\admin\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@vendor/svsoft/yii2-admin/assets';

    public $css = [
        'css/admin.css',
        'css/presets.css',
    ];
    public $js = [
        //'js/admin.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'dmstr\web\AdminLteAsset',
    ];

    public function init()
    {
        parent::init();
    }
}
