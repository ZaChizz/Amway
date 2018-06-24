<?php

namespace app\assets;

/**
 * Main backend application asset bundle.
 */
use yii\web\AssetBundle;
use yii\web\View;

class AdminLtePluginAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
    public $js = [
        'iCheck/icheck.min.js',
        // more plugin Js here
    ];
    public $css = [
        'iCheck/all.css',
        // more plugin CSS here
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];
}
