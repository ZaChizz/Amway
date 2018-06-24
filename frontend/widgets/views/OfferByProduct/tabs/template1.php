<?php 
use yii\helpers\Html;
?>
<div class="swiper-slide"> 
     <div class="paddings-container">
         <div class="product-slide-entry">
             <div class="product-image">
                 <img src="img/product-everything-1.jpg" alt="" />
                 <a class="top-line-a left"><i class="fa fa-retweet"></i></a>
                 <a class="top-line-a right"><i class="fa fa-heart"></i></a>
                 <div class="bottom-line">
                     <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                 </div>
             </div>
             <a class="tag" href="#">Men clothing</a>
                          <?= Html::a(Html::encode($model->title),['site/product', 'id'=>$model->id, 'ProductSearch[id_department]'=>$model->department->id],['class'=>'title']) ?>
             <div class="rating-box">
                 <div class="star">арт.</i></div>
                 <div class="star">476510</i></div>
             </div>
             <div class="price">
                 <div class="prev">$199,99</div>
                 <div class="current">$119,99</div>
             </div>
         </div>
     </div>
 </div>