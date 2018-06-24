<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_category')->textInput() ?>

    <?= $form->field($model, 'id_group')->textInput() ?>

    <?= $form->field($model, 'id_department')->textInput() ?>

    <?= $form->field($model, 'skin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'flavor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'volume')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rgb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'consist')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'packaging')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'applications')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'with_use')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'necessary')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'useful')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'variant_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vendor_code')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'short_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tag_search')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'display')->textInput() ?>

    <?= $form->field($model, 'grouping')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
