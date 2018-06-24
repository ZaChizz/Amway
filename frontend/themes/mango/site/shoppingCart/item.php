<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 16.03.2017
 * Time: 12:10
 */
use yii\helpers\Html;
?>

<tr id="<?='product'.$id?>">
    <td>
        <div class="traditional-cart-entry">
            <a href="#" class="image"><?= Html::img('../../img/210/'.$model['img'],['alt'=>$model['img']]) ?></a>
            <div class="content">
                <div class="cell-view">
                    <a href="#" class="tag"><?= $model['department']?></a>
                    <a href="#" class="title"><?= $model['title'] ?></a>
                    <div class="inline-description"><?= $model['vendor_code'] ?></div>
                    <div class="inline-description"><?= $model['brand'] ?></div>
                </div>
            </div>
        </div>
    </td>
    <td><?= $model['price']?></td>
    <td>
        <div class="quantity-selector detail-info-entry" cart="<?=$id?>">
            <div class="entry number-minus cart-minus">&nbsp;</div>
            <div class="entry number"><?= $model['count'] ?></div>
            <div class="entry number-plus cart-plus">&nbsp;</div>
        </div>
    </td>
    <td><div class="subtotal"><?= $model['price']*$model['count']?></div></td>
    <td><?= Html::a('<i class="fa fa-times"></i>',['site/delete-cart','id'=>$id],['class'=>'remove-button'])?></td>
</tr>
