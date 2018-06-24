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
        </div>
        <table class="cart-table">
            <tr>
                <th class="column-1">Товар</th>
                <th class="column-2">Цена</th>
                <th class="column-3">Количество</th>
                <th class="column-4">Итого</th>
                <th class="column-5"></th>
            </tr>
            <?php
                foreach($shoppingCart as $id=>$value)
                {
                    echo $this->render('shoppingCart/item', ['model'=>$value, 'id'=>$id]);
                }
                ?>

        </table>
    </div>
    <div class="cart-submit-buttons-box">
        <?= Html::a('Продолжить покупки', ['site/index'],['class'=>'button style-15'])?>
    </div>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-8 information-entry">
            <h3 class="cart-column-title">Персональные данные</h3>
            
                <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                    'mask' => '(099)-99-99-999',
                ]) ?>

                <?= $form->field($model, 'first_name') ?>           
        </div>
        <div class="col-md-4 information-entry">
            <div class="cart-summary-box">
                <div class="grand-total">Итого к оплате <i class="grandtotal"><?= $total?></i> грн.</div>

                <?= Html::a('Оформить заказ', ['site/shopping-cart'], ['class'=>'button style-10',
                    'data'=>[
                        'method' => 'post',
                        'confirm' => 'Вы готовы подвердить заказ?'
                    ]
                ]) ?>
                <a class="simple-link" href="#">Оформить заказ с несколькими адресами</a>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

<?= ShoppingCart::widget([
])
?>