<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
?>

<li>
    <?= Html::a('<i class="fa fa-angle-right"></i>'.Html::encode($model->title),['site/catalog', 'ProductSearch[id_group]'=>$model->id, 'ProductSearch[id_department]'=>$model->department->id]);?>
</li>

