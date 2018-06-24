<?php 
use frontend\widgets\DepartmentLandBlocks;
use frontend\widgets\OfferByProduct;
use frontend\widgets\CategoryLandBlocks;
?>
<div class="information-blocks">
                        
    <?= DepartmentLandBlocks::widget([
              'type' => 'horizontal'
        ])
    ?>

    <div class="row">
            <?= DepartmentLandBlocks::widget([
                  'type' => 'vertical'
                ])
            ?>

        <div class="custom-col-3">
            <?= OfferByProduct::widget([
                    'type'=>'tabs',
                    'template'=>'template3',

                ])
            ?>

            <?= CategoryLandBlocks::widget([

                ])
            ?>

            <div class="clear"></div>
        </div>
    </div>
</div>