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
		'css/ripples.min.css',
		'css/material-wfont.min.css',
		'css/lavish-bootstrap.css',
		'css/snackbar.min.css',
		'css/site.css',
	];
	public $js = [
		'js/ripples.min.js',
		'js/material.min.js',
		'js/snackbar.min.js'
	];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
