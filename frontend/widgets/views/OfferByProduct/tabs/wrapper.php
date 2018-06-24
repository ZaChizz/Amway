<div class="tabs-entry">
    <div class="products-swiper">
        <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-int-slides="2" data-sm-slides="2" data-md-slides="3" data-lg-slides="4" data-add-slides="6">
            <div class="swiper-wrapper">
                <?php $i = 0; foreach ($models as $model):?>
                    <?= $this->render($template, ['model'=>$model->product]);?>
                <?php endforeach;?>              
            </div>
            <div class="pagination"></div>
        </div>
    </div>
</div>