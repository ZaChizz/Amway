<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 15.03.2017
 * Time: 16:42
 */
use yii\helpers\Html;
use frontend\widgets\ShoppingCart;
use yii\widgets\ActiveForm;
?>

<div class="information-blocks">
    <div class="table-responsive">
        <div class="cart-submit-buttons-box">
            <?= Html::a('Продолжить покупки', ['site/index'],['class'=>'button style-15'])?>
            <div class="message-box message-success">
                <div class="message-icon"><i class="fa fa-check"></i></div>
                <div class="message-text"><b>Ваш заказ(№<?=$model->id?>) принят</b> Спасибо, с вами свяжутся по телефону</div>
                <div class="message-close"><i class="fa fa-times"></i></div>
            </div>
        </div>
        
    </div>
</div>

<?= ShoppingCart::widget([
])
?>