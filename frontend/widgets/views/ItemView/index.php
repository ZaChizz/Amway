<?php
/**
 * Created by NetBeans.
 * User: Ievgen
 * Date: 29.12.2016
 * Time: 17:04
 */

use yii\helpers\Html;
//use app\models\ProductMedia;
?>
<div class="col-md-3 col-sm-4 shop-grid-item">
     <div class="product-slide-entry shift-image">
         <div class="product-image">
             <?= $this->render('_img',['model'=>$model])?>
             <div class="bottom-line left-attached">
                 <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                 <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                 <a class="bottom-line-a square open-product" cart="product-popup<?= $model->id?>"><i class="fa fa-expand"></i></a>
             </div>
         </div>
         <?= Html::a(Html::encode($model->category->title),['site/catalog', 'ProductSearch[id_category]'=>$model->category->id, 'ProductSearch[id_department]'=>$model->department->id],['class'=>'tag']) ?>
         <?= Html::a(Html::encode($model->title),['site/product', 'id'=>$model->id, 'ProductSearch[id_department]'=>$model->department->id],['class'=>'title']) ?>
         <div class="rating-box">
              <div class="star"><?= $model->vendor_code ?></div>
             <div class="reviews-number">25 reviews</div>
         </div>
         <div class="article-container style-1">
             <p><?= $model->short_description ?></p>
         </div>
         <div class="price">
             <div class="prev"><?= $model->pricePrev ?>грн</div>
             <div class="current"><?= $model->priceCurrent ?>грн</div>
         </div>
         <div class="list-buttons">
             <a class="button style-10">В корзину</a>
             <a class="button style-11"><i class="fa fa-heart"></i>Мои желания</a>
         </div>
     </div>
     <div class="clear"></div>
 </div>
