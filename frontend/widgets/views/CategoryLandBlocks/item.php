<?php

use yii\helpers\Html;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="swiper-slide"> 
    <div class="paddings-container">
        <div class="product-slide-entry">
            <img src="img/product-everything-5.jpg" alt="" />
             <?= Html::a('<b>'.$model->title.'</b>',['site/catalog','ProductSearch[id_group]'=>$model->id, 'ProductSearch[id_department]'=>$model->department->id],['class'=>'title'])?>
            <ul class="list-type-1">
                <?php foreach($model->category as $value):?>
                     <li>
                        <?= Html::a('<i class="fa fa-angle-right"></i>'.$value->title,['site/catalog','ProductSearch[id_category]'=>$value->id, 'ProductSearch[id_department]'=>$model->department->id])?>
                     </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

