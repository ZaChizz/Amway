<?php
use frontend\widgets\ItemView;
use frontend\widgets\LinkPagerExtended;
use frontend\widgets\ProductPopup;
use frontend\widgets\Search;
use frontend\widgets\ShoppingCart;
use frontend\widgets\Filter;
use frontend\widgets\FilterLink;

$this->title = 'Каталог';
$this->params['breadcrumbs'][] = [
                                    'label' => 'Каталог',
                                    'url' => ['site/catalog'],
                                    'template' => "{link}\n", // template for this link only
                                ];
                                                   
?>
<div class="information-blocks">
    <div class="row">
        <?= ItemView::widget([
            'dataProvider' => $dataProvider,
            'display' => false,
            ]);
        ?>

        <div class="col-md-9 col-md-push-3 col-sm-8 col-sm-push-4">
            <div class="page-selector">
                <?php
                    echo LinkPagerExtended::widget([
                        'pagination' => $dataProvider->pagination,
                        'maxButtonCount'=>10,
                        'tagWrapper'=>'div',
                        'disableWrappenItem'=>true,

                        'options' => [
                            'class' => 'pages-box hidden-xs',
                        ],
                        'linkOptions'=> [
                            'class' => 'square-button',
                        ],
                        'prevPageCssClass' => 'square-button',
                        'nextPageCssClass' => 'square-button',
                        'pageCssClass'=>'square-button',
                    ]);
                ?>


                <div class="shop-grid-controls">

                    <div class="entry">
                        <div class="view-button active grid"><i class="fa fa-th"></i></div>
                        <div class="view-button list"><i class="fa fa-list"></i></div>
                    </div>

                </div>
                <div class="clear"></div>
            </div>
            <div class="row shop-grid grid-view">

                <?= ItemView::widget([
                    'dataProvider' => $dataProvider,
                    ]);
                ?>

            </div>
            <div class="page-selector">
                <div class="description">Showing: 1-3 of 16</div>
                <?php
                    echo LinkPagerExtended::widget([
                        'pagination' => $dataProvider->pagination,
                        'maxButtonCount'=>10,
                        'tagWrapper'=>'div',
                        'disableWrappenItem'=>true,

                        'options' => [
                            'class' => 'pages-box hidden-xs',
                        ],
                        'linkOptions'=> [
                            'class' => 'square-button',
                        ],
                        'prevPageCssClass' => 'square-button',
                        'nextPageCssClass' => 'square-button',
                        'pageCssClass'=>'square-button',
                    ]);
                ?>
                <div class="clear"></div>
            </div>
        </div>

        <div class="col-md-3 col-md-pull-9 col-sm-4 col-sm-pull-8 blog-sidebar">
            <?= FilterLink::widget([]) ?>

        </div>
                        
    </div>
</div>

<?= ProductPopup::widget([
        'models' => $dataProvider->getModels(),
    ])
?>

<?= 
    Search::widget([
          'template' => 'popup'
    ])
?> 

<?= ShoppingCart::widget([
])
?>

 