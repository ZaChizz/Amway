<?php 
use yii\helpers\Html;
?>
<div class="col-sm-4 information-entry">
    <h3 class="block-title inline-product-column-title"><?= $title ?></h3>

    <?php $i = 0; foreach ($models as $key=>$model):?>
        <?php if($key<3):?>
        
            <div class="inline-product-entry">
                 <a href="#" class="image">
                    <img alt="" src="img/product-image-inline-2.jpg">
                </a>
                 <div class="content">
                     <div class="cell-view">
                         <?= Html::a(Html::encode($model->product->title),['site/product', 'id'=>$model->product->id, 'ProductSearch[id_department]'=>$model->product->department->id],['class'=>'title']) ?>
                         <div class="price">
                             <div class="prev"><?= $model->product->pricePrev ?>грн.</div>
                             <div class="current"><?= $model->product->priceCurrent ?>грн.</div>
                         </div>
                     </div>
                 </div>
                 <div class="clear"></div>
             </div>
    
        <?php endif; ?>
    <?php endforeach;?>
</div>