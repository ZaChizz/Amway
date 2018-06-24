<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="submenu">
    <?php 
    foreach($model as $value)
    {
        if($value->id != $exept_id)
            echo $this->render('item', ['model'=>$value]);
    }
    ?>
    
    <div class="submenu-links-line">
        <div class="submenu-links-line-container">
            <div class="cell-view">
                <div class="line-links"><b>Популярно:</b>  <a href="shop.html">кухонная посуда</a>, <a href="shop.html"></a>, <a href="shop.html">обувь</a>, <a href="shop.html">сумки</a>, <a href="shop.html">специальные предложения</a>, <a href="shop.html">подарочные скидки</a></div>
            </div>
            <div class="cell-view">
                <div class="red-message"><b>Решайся на покупки мечты и не уписти скидки до 20%!</b></div>
            </div>
        </div>
    </div>
</div>