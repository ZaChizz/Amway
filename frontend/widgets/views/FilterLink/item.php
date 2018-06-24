<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;

?>
<div class="accordeon-title">
    <?= Html::a(Html::encode($model->title),['site/catalog',  'ProductSearch[id_'.$c_relation.']'=>$model->id, 'ProductSearch[id_department]'=>$model->department->id,]);?>
</div>
<div class="accordeon-entry">
    <div class="article-container style-1">
        <ul>
            <?php foreach($model->$relation as $value):?>
            <li>
                <?= Html::a(Html::encode($value->title),['site/catalog', 'ProductSearch[id_'.$relation.']'=>$value->id, 'ProductSearch[id_department]'=>$value->department->id]);?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>