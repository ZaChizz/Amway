<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use backend\models\Product;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Картинки';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-picture-o"></i>
        <h3 class="box-title">Картинки</h3>
    </div>
    <div class="box-body pad table-responsive">
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'vendor_code',
            'id',
            'id_product',
            [
            'attribute' => 'id_product',
                'contentOptions'=>['style'=>'max-width: 200px; white-space: normal;'],
                'label' => 'Товар',
                'value' => function ($model, $key, $index, $column) {
                    /* @var common\models\Action $model */
                    return Html::a($model->product->title, ['/product/view', 'id_product' => $model->id_product]);
                },
                'format' =>'raw',
                'filter' => ArrayHelper::map(Product::find()->all(), 'id', 'title')
            ],
            'title',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
    </div><!-- /.box -->
</div>
