<?php
use frontend\widgets\DepartmentCatalogMenu;
use yii\helpers\Html;
?>

<div class="header-wrapper style-10">
    <header class="type-1">

        <div class="header-product">
            <div class="logo-wrapper">
                <?= Html::a('<img alt="" src="img/amway.png">',['site/index'],['id'=>'logo']);?>
            </div>
            <div class="product-header-message">
                Доставка по Украине Новой Почтой
            </div>
            <div class="product-header-content">
                <div class="line-entry">
                    <div class="menu-button responsive-menu-toggle-class"><i class="fa fa-reorder"></i></div>
                    <div class="header-top-entry increase-icon-responsive open-search-popup">
                        <div class="title"><i class="fa fa-search"></i> <span>Поиск</span></div>
                    </div>
                    <div class="header-top-entry increase-icon-responsive">
                        <div class="title"><i class="fa fa-user"></i> <span>Мой аккаунт</span></div>
                    </div>
                </div>
                <div class="middle-line"></div>
                <div class="line-entry">
                    <a href="#" class="header-functionality-entry"><i class="fa fa-heart-o"></i><span>Желания</span></a>
                    <?php
                    if(Yii::$app->params['shoppingCartTotal'])
                        echo Html::a(
                            '<i class="fa fa-shopping-cart"></i><span>Корзина</span> <b class="cartGrandtotal">'.Yii::$app->params['shoppingCartTotal'].'</b> грн.',
                            ['site/shopping-cart'],
                            ['class'=>'header-functionality-entry open-cart-popup']);
                    else
                        echo Html::a(
                            '<i class="fa fa-shopping-cart"></i><span>Корзина</span> <b class="cartGrandtotal">'.Yii::$app->params['shoppingCartTotal'].'</b> грн.',
                            false,
                            ['class'=>'header-functionality-entry open-cart-popup']);

                    ?>

                </div>
            </div>
        </div>

        <div class="close-header-layer"></div>
        <div class="navigation">
            <div class="navigation-header responsive-menu-toggle-class">
                <div class="title">Navigation</div>
                <div class="close-menu"></div>
            </div>
            <div class="nav-overflow">
                <nav>
                    <ul>
                        <li class="full-width-columns">
                            <?= Html::a('Отделы',['site/catalog']);?>
                            <i class="fa fa-chevron-down"></i>
                                <?= DepartmentCatalogMenu::widget([      
                                ]);?>
   
                        </li>
                    </ul>
                    <ul>
                        <li><a href="#">О нас</a></li>
                        <li><a href="#">Условие доставки</a></li>
                        <li><a href="#">Возврат</a></li>
                        <li><a href="#">Контакты</a></li>
                        <li class="fixed-header-visible">
                            <a class="fixed-header-square-button open-cart-popup"><i class="fa fa-shopping-cart"></i></a>
                            <a class="fixed-header-square-button open-search-popup"><i class="fa fa-search"></i></a>
                        </li>
                    </ul>
                    <div class="clear"></div>

                    <a class="fixed-header-visible additional-header-logo"><img src="img/amway.png" alt=""/></a>
                </nav>
                <div class="navigation-footer responsive-menu-toggle-class">
                    <div class="socials-box">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        <div class="clear"></div>
                    </div>
                    <div class="navigation-copyright">Created by <a href="#">8theme</a>. All rights reserved</div>
                </div>
            </div>
        </div>
    </header>
    <div class="clear"></div>
</div>