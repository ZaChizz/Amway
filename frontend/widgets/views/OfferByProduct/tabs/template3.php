<?php 
use yii\helpers\Html;
?>
<div class="swiper-slide"> 
    <div class="paddings-container">
        <div class="product-slide-entry">
            <div class="product-image">
                <img src="img/product-everything-3.jpg" alt="" />
                <div class="bottom-line left-attached">
                    <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                    <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                    <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                    <a class="bottom-line-a square open-product" cart="product-popup<?= $model->id?>"><i class="fa fa-expand"></i></a>
                </div>
            </div>
            <a class="tag" href="#"><?= $model->category->title ?></a>
            <?= Html::a(Html::encode($model->title),['site/product', 'id'=>$model->id, 'ProductSearch[id_department]'=>$model->department->id],['class'=>'title']) ?>
            <div class="rating-box">
                <div class="star"><i class="fa fa-star"></i></div>
                <div class="star"><i class="fa fa-star"></i></div>
                <div class="star"><i class="fa fa-star"></i></div>
                <div class="star"><i class="fa fa-star"></i></div>
                <div class="star"><i class="fa fa-star"></i></div>
            </div>
            <div class="price">
                <div class="prev"><?= $model->pricePrev ?>грн</div>
                <div class="current"><?= $model->priceCurrent ?>грн</div>
            </div>
        </div>
    </div>
</div>