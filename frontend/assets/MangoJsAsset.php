<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class MangoJsAsset extends AssetBundle
{
    public $basePath = '@webroot/js';
    public $baseUrl = '@web/js';
    public $js = [
      ///  'jquery-2.1.3.min.js',
        'idangerous.swiper.min.js',
        'global.js',
        'jquery.mousewheel.js',
        'jquery.jscrollpane.min.js'

    ];

    public $jsOptions = [
        'position' => View::POS_END,
    ];

}

