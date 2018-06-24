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
            if($key<2)
            {
                if(count($model->images) == 1)
                {
                    echo Html::img('../../img/210/'.$image->title,['alt'=>$image->product->title]);
                    echo Html::img('../../img/210/'.$image->title,['alt'=>$image->product->title]);
                }
                echo Html::img('../../img/210/'.$image->title,['alt'=>$image->product->title]);
            }
                
            
        }
    }
    else {
        echo  Html::img('img/product-minimal-1.jpg');
        echo  Html::img('img/product-minimal-11.jpg');
    }
?>


