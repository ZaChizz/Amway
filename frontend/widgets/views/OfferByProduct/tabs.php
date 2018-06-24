<?php
use frontend\widgets\ProductPopup;
?>


<div class="information-blocks">
    <div class="tabs-container">
        <div class="swiper-tabs tabs-switch">
            <div class="title">Products</div>
            <div class="list">
                <?php $i = 0; foreach ($separator as $key=>$value):?>
                    <a class="block-title tab-switcher <?= !$i?"active":""; $i++; ?>"><?= $key?></a>
                <?php endforeach;?>

                <div class="clear"></div>
            </div>
        </div>
        <div>
            <?php $i = 0; foreach ($separator as $key=>$value):?>
                 <?= $this->render('tabs\wrapper', ['models'=>$separator[$key], 'template'=>$template]);?> 
            <?php endforeach;?>
  
        </div>
    </div>
</div>

<?= ProductPopup::widget([
        'models' => $products,
    ])
?>