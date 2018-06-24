<?php

use yii\helpers\Html;
use demi\cropper\Cropper;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model backend\models\product */

$this->title = $model->vendor_code;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->vendor_code;
?>
<div class="product-update">

    <div class="nav-tabs-custom">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs pull-right">
            <li class="active"><a href="#description" data-toggle="tab">Описание</a></li>
            <li class=""><a href="#photo" data-toggle="tab">Фото</a></li>
            <li class=""><a href="#option" data-toggle="tab">Опции</a></li>
            <li class="pull-left header"><i class="fa fa-inbox"></i> <?= $model->title?></li>
        </ul>
        <div class="tab-content no-padding">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane active" id="description" style="position: relative; min-height: 300px;">
                <div class="box-body pad table-responsive">
                    <?= $this->render('_formDescription', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
         
            <div class="chart tab-pane" id="photo">
                <div class="box-body pad table-responsive">
                    <?= $this->render('_uploadPhoto', [
                        'modelImage' => $modelImage,
                        'model' => $model,
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]) ?> 
                </div>
            </div>
            
            <div class="chart tab-pane" id="option" style="position: relative;">
                <div class="box-body pad table-responsive">
                   <?= $this->render('_form', [
                        'model' => $model, 'items'=>$items
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

