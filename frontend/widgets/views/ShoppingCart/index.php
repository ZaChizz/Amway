<?php

use yii\helpers\Html;
?>
<div class="cart-box popup">
    <div class="popup-container">
        <?php
        foreach($model as $id=>$value)
        {
            echo $this->render('item', ['model'=>$value, 'id'=>$id]);
        }
        ?>
        <div class="summary">
            <div class="grandtotal">Итого к оплате <span class="cartGrandtotal"><?= $total ?></span> грн.</div>
        </div>
        <div class="cart-buttons">
            <div class="column">
                <?= Html::a(
                    'корзина',
                    ['site/shopping-cart'],
                    ['class'=>'button style-3'])
                ?>
                <div class="clear"></div>
            </div>
            <div class="column">
                <a class="button style-4">заказать</a>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>