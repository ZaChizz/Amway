<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
?>

    <div class="product-column-entry">
        <div class="image"><img alt="" src="img/product-menu-2.jpg"></div>
        <div class="submenu-list-title">
            <?= Html::a(Html::encode($model->landTitle),['site/catalog', 'ProductSearch[id_department]'=>$model->id]);?>
            <span class="toggle-list-button"></span>
        </div>
        <div class="description toggle-list-container">           
            <ul class="list-type-1">
                <?php 
                foreach($model->group as $value)
                {
                    echo $this->render('group', ['model'=>$value]);
                }
                ?>
            </ul>
        </div>
        <?php if($model->label): ?>
                <div class="<?= $model->labelClass?>"><?= $model->label ?></div>
        <?php endif; ?>        
    </div>

