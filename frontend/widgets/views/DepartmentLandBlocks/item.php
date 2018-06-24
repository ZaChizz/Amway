<?php

use yii\helpers\Html;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="custom-col-<?= $key ?>">
    <?= Html::a($this->render('item_a', 
            ['model'=>$model]),
            ['site/catalog','ProductSearch[id_department]'=>$model->id],
            ['class'=>'promo-banner-box', 'style'=>'background-image: url(img/product-promo-1.jpg); background-color:'.$model->backgroundColor]) ?>

    <div class="clear"></div>
</div>
