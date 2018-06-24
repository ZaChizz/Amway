<?php
use yii\helpers\Html;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php 
    if(count($model->images)) 
    {
        foreach($model->images as $key=>$image)
        {
            if($key<4):?>
            
<div class="swiper-slide">
    <div class="product-zoom-image">
        <?= Html::img('../../img/570/'.$image->title,['alt'=>$image->product->title,'data-zoom'=>'../../img/570/'.$image->title]); ?>
    </div>
</div>

<?php 
            endif;
        }
    }
    else
    {
?>

<div class="swiper-slide">
    <div class="product-zoom-image">
        <img src="img/product-main-1.jpg" alt="" data-zoom="img/product-main-1-zoom.jpg" />
    </div>
</div>
<?php
    }
 ?>

