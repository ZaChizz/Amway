<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class MangoCssAsset extends AssetBundle
{
    
    public $basePath = '@webroot/css';
    public $baseUrl = '@web/css';
   
    public $css = [
        'idangerous.swiper.css',
        'font-awesome.min.css',
        'style.css'
    ];

    public $cssOptions = [
        'position' => View::POS_HEAD,
        'media' => 'all'
    ];

}

