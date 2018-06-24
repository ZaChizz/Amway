<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\widgets\ShoppingCart;
use backend\models\Order;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'display')->dropDownList(Order::STATUS,['prompt' => 'Выберите статус...']); ?>
    
     <?= $form->field($model, 'updated_at')->hiddenInput() ?>
    
    <div class="col-md-12">
        <?= ShoppingCart::widget([
        
        'model'=>$model->shopping_cart
        
        ]);?>
    </div>

    
    <div class="form-group field-order-created_at">
        <label class="control-label" for="order-created_at"><?=$model->getAttributeLabel('created_at');?></label>
        <?= Html::input('text', 'created_at', Yii::$app->formatter->asDatetime($model->created_at), ['class'=>'form-control', 'disabled'=>true])?>
        <div class="help-block"></div>
    </div>
    
    <div class="form-group field-order-created_at">
        <label class="control-label" for="order-created_at"><?=$model->getAttributeLabel('updated_at');?></label>
        <?= Html::input('text', 'updated_at', Yii::$app->formatter->asDatetime($model->updated_at), ['class'=>'form-control', 'disabled'=>true])?>
        <div class="help-block"></div>
    </div>
   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>