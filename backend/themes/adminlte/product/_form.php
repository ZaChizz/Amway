<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="box-body">
      <div class="box-group" id="accordion">
        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
        <div class="panel box box-primary">
          <div class="box-header with-border">
            <h4 class="box-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                Основное
              </a>
            </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in">
            <div class="box-body">
                <?= $form->field($model, 'id_department')->dropDownList(ArrayHelper::map($items['department'], 'id', 'title'),['prompt' => 'Выберите отдел...']); ?>
                <?= $form->field($model, 'id_group')->dropDownList($items['group'],['prompt' => 'Выберите группу...']); ?>
                <?= $form->field($model, 'id_category')->dropDownList(ArrayHelper::map($items['category'], 'id', 'title'),['prompt' => 'Выберите категорию....']); ?>
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'vendor_code')->textInput() ?>

            </div>
          </div>
        </div>
        <div class="panel box box-danger">
          <div class="box-header with-border">
            <h4 class="box-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                Описание
              </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse">
            <div class="box-body">
                <?= $form->field($model, 'short_description')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                <?= $form->field($model, 'tag_search')->textInput(['maxlength' => true]) ?>
            </div>
          </div>
        </div>
        <div class="panel box box-success">
          <div class="box-header with-border">
            <h4 class="box-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                Опции
              </a>
            </h4>
          </div>
          <div id="collapseThree" class="panel-collapse collapse">
            <div class="box-body">

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

                <?= $form->field($model, 'variant_title')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'created_at')->textInput() ?>

                <?= $form->field($model, 'updated_at')->textInput() ?>

                <?= $form->field($model, 'display')->textInput() ?>

                <?= $form->field($model, 'grouping')->textInput() ?>
            </div>
          </div>
        </div>
      </div>
        
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>





    <?php ActiveForm::end(); ?>
</div>
