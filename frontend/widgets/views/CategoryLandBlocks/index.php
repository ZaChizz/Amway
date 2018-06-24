<div class="information-blocks">
    <div class="tabs-container">
        <div class="swiper-tabs tabs-switch">
            <a class="block-title tab-switcher active">Категории</a>
            <div class="clear"></div>
        </div>
        <div>
            <div class="tabs-entry">
                <div class="products-swiper">
                    <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-int-slides="2" data-sm-slides="2" data-md-slides="3" data-lg-slides="4" data-add-slides="6">
                        <div class="swiper-wrapper">
                            <?php 
                                foreach($model as $key=>$value)
                                {

                                    echo $this->render('item', ['model'=>$value, 'key'=>2]);

                                }
                            ?>
                        </div>
                        <div class="pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>