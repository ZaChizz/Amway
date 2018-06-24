<?php 
use yii\helpers\Html;
?>
<div class="swiper-slide"> 
     <div class="paddings-container">
         <div class="product-slide-entry">
             <div class="product-image">
                 <img src="img/product-everything-2.jpg" alt="" />
                 <a class="top-line-a right open-product" cart="product-popup<?= $model->id?>"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                 <div class="bottom-line">
                     <div class="right-align">
                         <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                         <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                     </div>
                     <div class="left-align">
                         <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                     </div>
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