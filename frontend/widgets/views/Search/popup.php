<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="search-box popup">
    <?php
        $form = ActiveForm::begin([
        'method' => 'post',
        'action' => ['site/search'],
        ]);
    ?>
        <div class="search-button">
            <i class="fa fa-search"></i>
            <input type="submit" />
        </div>
        <div class="search-drop-down">
            <div class="title"><span>Все отделы</span><i class="fa fa-angle-down"></i></div>
            <div class="list">
                <div class="overflow">
                    <?php foreach($department as $value):?>
                        <div class="category-entry"><?= $value->title?></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="search-field">
            <?= Html::activeInput('text',$model,'query',['placeholder' => 'Введите поисковый запрос']); ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>