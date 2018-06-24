<?php

use yii\helpers\Html;
use frontend\widgets\ShoppingCart;
use frontend\widgets\VariationProduct;
use frontend\widgets\ZoomImage;

?>

<div id="<?= 'product-popup'.$model->id ?>" class="overlay-popup">
        <div class="overflow">
            <div class="table-view">
                <div class="cell-view">
                    <div class="close-layer"></div>
                    <div class="popup-container">

                        <div class="row">
                            <div class="col-sm-6 information-entry">
                                <div class="product-preview-box">
                                    <?= ZoomImage::widget([
                                        'model'=>$model
                                    ])?>
                                </div>
                            </div>
                            <div class="col-sm-6 information-entry">
                                <div class="product-detail-box">
                                    <h1 class="product-title"><?= $model->title?></h1>
                                    <h3 class="product-subtitle"><?= $model->category->title?></h3>
                                    <div class="rating-box">
                                        <div class="star">артикул</div>
                                        <div class="star"><?= $model->vendor_code ?></div>
                                        <div class="rating-number">25 отзывы</div>
                                    </div>
                                    <div class="product-description detail-info-entry"><?= $model->short_description ?></div>
                                    <div class="price detail-info-entry">
                                        <div class="prev"><?= $model->pricePrev ?> грн.</div>
                                        <div class="current"><?= $model->priceCurrent ?> грн.</div>
                                    </div>
                                    <?= Html::beginForm(['site/ad-cart'], 'post') ?>
                                    <?= VariationProduct::widget([
                                            'model'=>$model,
                                            'formModel'=>$shoppingCart,
                                        ])
                                    ?>

                                    <div class="quantity-selector detail-info-entry">
                                        <div class="detail-info-entry-title">Количество</div>
                                        <div class="entry number-minus amt-minus">&nbsp;</div>
                                        <div class="entry number">1</div>
                                        <div class="entry number-plus amt-plus">&nbsp;</div>
                                        <?= Html::activeHiddenInput($shoppingCart,'amt',['class'=>'amt'])?>
                                    </div>
                                    <div class="detail-info-entry">
                                        <?= Html::submitButton('В Корзину', ['class' => 'button style-10']) ?>
                                        <?= Html::endForm() ?>
                                        <a class="button style-11"><i class="fa fa-heart"></i>Желания</a>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="tags-selector detail-info-entry">
                                        <div class="detail-info-entry-title">Теги:</div>
                                        <?= $model->tagsAsLinksearch?>

                                    </div>
                                    <div class="share-box detail-info-entry">
                                        <div class="title">Социальные сети</div>
                                        <div class="socials-box">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                            <a href="#"><i class="fa fa-youtube"></i></a>
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                            <a href="#"><i class="fa fa-instagram"></i></a>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="close-popup"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>