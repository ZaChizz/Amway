<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 20.03.2017
 * Time: 18:02
 */
use yii\helpers\Html;
?>
<div class="cart-entry" id="<?= 'product-cart'.$id ?>">
    <a class="image"><?= Html::img('../../img/210/'.$model['img'],['alt'=>$model['img']]) ?></a>
    <div class="content">
        <a class="title" href="#"><?= $model['title'] ?></a>
        <div class="quantity">Количество: <i><?= $model['count'] ?></i></div>
        <div class="price"><?= $model['price']*$model['count']?></div>
    </div>
    <div class="button-x cartDelete"><i class="fa fa-close"></i></div>
</div>
