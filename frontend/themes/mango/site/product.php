<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use frontend\widgets\ShoppingCart;
use frontend\widgets\VariationProduct;
use frontend\widgets\ZoomImage;
use frontend\widgets\Search;

$this->title = $model->title;
$this->params['breadcrumbs'][] = [
                                    'label' => 'Каталог',
                                    'url' => ['site/catalog'],
                                    'template' => "{link}\n", // template for this link only
                                ];
$this->params['breadcrumbs'][] = [
                                    'label' => $model->department->title,
                                    'url' => ['site/catalog', 'ProductSearch[id_department]'=>$model->department->id],
                                    'template' => "{link}\n", // template for this link only
                                ];
$this->params['breadcrumbs'][] = [
                                    'label' => $model->group->title,
                                    'url' => ['site/catalog', 'ProductSearch[id_group]'=>$model->group->id, 'ProductSearch[id_department]'=>$model->department->id],
                                    'template' => "{link}\n", // template for this link only
                                ];
$this->params['breadcrumbs'][] = [
                                    'label' => $model->category->title,
                                    'url' => ['site/catalog', 'ProductSearch[id_category]'=>$model->category->id, 'ProductSearch[id_department]'=>$model->department->id],
                                    'template' => "{link}\n", // template for this link only
                                ];
$this->params['breadcrumbs'][] = [
                                    'label' => $this->title,
                                    'url' => false,
                                    'template' => "{link}\n", // template for this link only
                                ];
                                                   
?>
<div class="information-blocks">
    <div class="row">
        <div class="col-sm-5 col-md-4 col-lg-5 information-entry">
            <div class="product-preview-box">
                <?= ZoomImage::widget([
                    'model'=>$model
                ])?>
            </div>
        </div>
        <div class="col-sm-7 col-md-4 information-entry">
            <div class="product-detail-box">
                <h1 class="product-title"><?= $model->title?></h1>
                <h3 class="product-subtitle"><?= $model->brand?></h3>
                <div class="rating-box">
                    <div class="star">артикул</div>
                    <div class="star"><?= $model->vendor_code ?></div>
                    <div class="rating-number">25 отзывы</div>
                </div>
                <div class="product-description detail-info-entry"><?= $model->volume ?>/<?= $model->weight ?>/<?= $model->amount ?></div>
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
                    <div class="title">Share in social media</div>
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
        <div class="clear visible-xs visible-sm"></div>
        <div class="col-md-4 col-lg-3 information-entry product-sidebar">
            <div class="row">
                <div class="col-md-12">
                    <div class="information-blocks production-logo">
                        <div class="background">
                            <div class="logo"><img src="img/production-logo.png" alt="" /></div>
                            <a href="#">Review this producent</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="information-blocks">
                        <div class="information-entry products-list">
                            <h3 class="block-title inline-product-column-title">Featured products</h3>
                            <div class="inline-product-entry">
                                <a href="#" class="image"><img alt="" src="img/product-image-inline-1.jpg"></a>
                                <div class="content">
                                    <div class="cell-view">
                                        <a href="#" class="title">Pullover Batwing Sleeve Zigzag</a>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="inline-product-entry">
                                <a href="#" class="image"><img alt="" src="img/product-image-inline-2.jpg"></a>
                                <div class="content">
                                    <div class="cell-view">
                                        <a href="#" class="title">Pullover Batwing Sleeve Zigzag</a>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="inline-product-entry">
                                <a href="#" class="image"><img alt="" src="img/product-image-inline-3.jpg"></a>
                                <div class="content">
                                    <div class="cell-view">
                                        <a href="#" class="title">Pullover Batwing Sleeve Zigzag</a>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="information-blocks">
    <div class="tabs-container style-1">
        <div class="swiper-tabs tabs-switch">
            <div class="title">Описание товара</div>
            <div class="list">
                <a class="tab-switcher active">Описание</a>
                <a class="tab-switcher">Отзывы (25)</a>
                <a class="tab-switcher">Доставка и возврат</a>
                <div class="clear"></div>
            </div>
        </div>
        <div>
            <div class="tabs-entry">
                <div class="article-container style-1">
                    <div class="row">
                        <div class="information-blocks">
                            <div class="accordeon size-1">
                                <div class="accordeon-title active">Описание</div>
                                <div style="display: block;" class="accordeon-entry">
                                    <div class="article-container style-1">
                                        <p>
                                            <?= $model->description ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="accordeon-title">Состав</div>
                                <div class="accordeon-entry">
                                    <div class="article-container style-1">
                                        <p>
                                            <?= $model->consist ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="accordeon-title">Способ применения</div>
                                <div class="accordeon-entry">
                                    <div class="article-container style-1">
                                        <p>
                                            <?= $model->applications ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="accordeon-title">С этим средством используют</div>
                                <div class="accordeon-entry">
                                    <div class="article-container style-1">
                                        <p>
                                            <?= $model->with_use ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="accordeon-title">Это средство необходимо для людей, у которых:</div>
                                <div class="accordeon-entry">
                                    <div class="article-container style-1">
                                        <p>
                                            <?= $model->necessary ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="accordeon-title">Это полезно знать</div>
                                <div class="accordeon-entry">
                                    <div class="article-container style-1">
                                        <p>
                                            <?= $model->useful ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
           
            <div class="tabs-entry">
                <div class="article-container style-1">
                    <div class="row">
                        <div class="col-md-6 information-entry">
                            <h4>RETURNS POLICY</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.</p>
                            <ul>
                                <li>Any Product types that You want - Simple, Configurable</li>
                                <li>Downloadable/Digital Products, Virtual Products</li>
                                <li>Inventory Management with Backordered items</li>
                                <li>Customer Personal Products - upload text for embroidery, monogramming</li>
                                <li>Create Store-specific attributes on the fly</li>
                            </ul>
                        </div>
                        <div class="col-md-6 information-entry">
                            <h4>SHIPPING</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                            <ul>
                                <li>Any Product types that You want - Simple, Configurable</li>
                                <li>Downloadable/Digital Products, Virtual Products</li>
                                <li>Inventory Management with Backordered items</li>
                                <li>Customer Personal Products - upload text for embroidery, monogramming</li>
                                <li>Create Store-specific attributes on the fly</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tabs-entry">
               <div class="article-container style-1">
                   <div class="row">
                       <div class="col-md-6 information-entry">
                           <h4>RETURNS POLICY</h4>
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.</p>
                           <ul>
                               <li>Any Product types that You want - Simple, Configurable</li>
                               <li>Downloadable/Digital Products, Virtual Products</li>
                               <li>Inventory Management with Backordered items</li>
                               <li>Customer Personal Products - upload text for embroidery, monogramming</li>
                               <li>Create Store-specific attributes on the fly</li>
                           </ul>
                       </div>
                       <div class="col-md-6 information-entry">
                           <h4>SHIPPING</h4>
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                           <ul>
                               <li>Any Product types that You want - Simple, Configurable</li>
                               <li>Downloadable/Digital Products, Virtual Products</li>
                               <li>Inventory Management with Backordered items</li>
                               <li>Customer Personal Products - upload text for embroidery, monogramming</li>
                               <li>Create Store-specific attributes on the fly</li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </div>
</div>



<?= ShoppingCart::widget([
])
?>

<?= 
    Search::widget([
          'template' => 'popup'
    ])
?> 

