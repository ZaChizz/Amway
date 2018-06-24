<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use backend\models\Order;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-picture-o"></i>
        <h3 class="box-title">Заказы</h3>
    </div>
    <div class="box-body pad table-responsive">
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'created_at:datetime',
            'id',
            'phone',
            'first_name',
            [
            'attribute' => 'display',
                'contentOptions'=>['style'=>'max-width: 200px; white-space: normal;'],
                'value' => function ($model, $key, $index, $column) {
                    $status = array('1'=>'новый','2'=>'в работе');
                    /* @var common\models\Action $model */
                    return Html::a($status[$model->display],false);
                },
                'format' =>'raw',
                'filter' => Order::STATUS,
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return \yii\helpers\Html::a('<div class="text-center"><button class="btn btn-info btn-sm">Подробнее</button></div>',
                            (new yii\grid\ActionColumn())->createUrl('order/update', $model, $model->id, 1), [
                                'title' => Yii::t('yii', 'view'),
                                'data-method' => 'post',
                            ]);
                    },
                ]
            ],
                        
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return \yii\helpers\Html::a('<div class="text-center"><button class="btn btn-danger btn-sm">Удалить</button></div>',
                            (new yii\grid\ActionColumn())->createUrl('order/delete', $model, $model->id, 1), [
                                'title' => Yii::t('yii', 'view'),
                                'data-method' => 'post',
                            ]);
                    },
                ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
    </div><!-- /.box -->
</div>

