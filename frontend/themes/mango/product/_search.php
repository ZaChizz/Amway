<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_category') ?>

    <?= $form->field($model, 'id_group') ?>

    <?= $form->field($model, 'id_department') ?>

    <?= $form->field($model, 'skin') ?>

    <?php // echo $form->field($model, 'flavor') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'volume') ?>

    <?php // echo $form->field($model, 'rgb') ?>

    <?php // echo $form->field($model, 'consist') ?>

    <?php // echo $form->field($model, 'packaging') ?>

    <?php // echo $form->field($model, 'applications') ?>

    <?php // echo $form->field($model, 'with_use') ?>

    <?php // echo $form->field($model, 'necessary') ?>

    <?php // echo $form->field($model, 'useful') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'brand') ?>

    <?php // echo $form->field($model, 'variant_title') ?>

    <?php // echo $form->field($model, 'vendor_code') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'short_description') ?>

    <?php // echo $form->field($model, 'tag_search') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'display') ?>

    <?php // echo $form->field($model, 'grouping') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
