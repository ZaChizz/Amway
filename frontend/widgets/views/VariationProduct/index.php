<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="detail-info-entry">
    <div class="simple-drop-down simple-field">
        <?= Html::activeDropDownList($formModel, 'id', ArrayHelper::map($model, 'id', 'variant_title')) ?>
    </div>
</div>

