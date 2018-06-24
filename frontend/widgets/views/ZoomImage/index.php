<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="swiper-container product-preview-swiper" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
    <div class="swiper-wrapper">
        <?= $this->render('swiper-sliders',['model'=>$model])?>
    </div>
    <div class="pagination"></div>
    <div class="product-zoom-container">
        <div class="move-box">
            <img class="default-image" src="img/product-main-1.jpg" alt="" />
            <img class="zoomed-image" src="img/product-main-1-zoom.jpg" alt="" />
        </div>
        <div class="zoom-area"></div>
    </div>
</div>
<div class="swiper-hidden-edges">
    <div class="swiper-container product-thumbnails-swiper" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="3" data-int-slides="3" data-sm-slides="3" data-md-slides="4" data-lg-slides="4" data-add-slides="4">
        <div class="swiper-wrapper">
            <?= $this->render('swiper-hidden-edges',['model'=>$model])?>
        </div>
        <div class="pagination"></div>
    </div>
</div>
