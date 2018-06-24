<?php
use yii\helpers\Html;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="departmets-drop-down hidden-xs">

    <div class="title"><i class="fa fa-reorder"></i><i class="fa fa-close"></i>Отделы</div>
    <ul class="list">
        <?php if($model)
            foreach($model as $value):
        ?>
        <li>
            <?= Html::a('<i class="fa fa-angle-right"></i>'.$value->title,['site/catalog','ProductSearch[id_department]'=>$value->id])?>
        </li>
        <?php endforeach; ?>
        
    </ul>
</div>
<div class="menu-button responsive-menu-toggle-class"><i class="fa fa-reorder"></i></div>
<div class="clear"></div>

