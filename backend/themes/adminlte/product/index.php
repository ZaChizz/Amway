<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use backend\models\Category;
use backend\models\Department;
use backend\models\Group;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-edit"></i>
        <h3 class="box-title">Меню</h3>
    </div>
    <div class="box-body pad table-responsive">
        <?= Html::a(Html::tag('span',
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'layout'=>"{summary}",
                    'summary' => "{totalCount}",
                ]),['class'=>'badge bg-green']).Html::tag('i','',['class'=>'fa fa-plus-square']).'Добавить', ['create'], ['class' => 'btn btn-app']) ?>
    </div>
</div>

<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-barcode"></i>
        <h3 class="box-title">Товары</h3>
    </div>
    <div class="box-body pad table-responsive">

        <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
            'firstPageLabel' => '<<',
            'lastPageLabel' => '>>',
        ],
        'layout'=>"{summary}\n{pager}\n{items}\n{summary}\n{pager}",
        'columns' => [
            'id',
            [
                'attribute' => 'title',
                'contentOptions'=>['style'=>'max-width: 200px; white-space: normal;'],
 
            ],
            'vendor_code',
            [
                'attribute' => 'id_department',
                'contentOptions'=>['style'=>'max-width: 200px; white-space: normal;'],
                'label' => 'Отдел',
                'value' => function ($model, $key, $index, $column) {
                    /* @var common\models\Action $model */
                    return Html::a($model->department->title, ['/department/view', 'id_department' => $model->id_department]);
                },
                'format' =>'raw',
                'filter' => ArrayHelper::map(Department::find()->all(), 'id', 'title'),
            ],
            [
                'attribute' => 'id_group',
                'contentOptions'=>['style'=>'max-width: 200px; white-space: normal;'],
                'label' => 'Группа',
                'value' => function ($model, $key, $index, $column) {
                    /* @var common\models\Action $model */
                    return Html::a($model->group->title, ['/group/view', 'id_group' => $model->id_group]);
                },
                'format' =>'raw',
                'filter' => ArrayHelper::map(Group::find()->all(), 'id', 'title'),
                'headerOptions' => [
                    'style' => 'width: 65px;',
                    ], 
            ],
            [
                'attribute' => 'id_category',
                'contentOptions'=>['style'=>'max-width: 200px; white-space: normal;'],
                'label' => 'Категории',
                'value' => function ($model, $key, $index, $column) {
                    /* @var common\models\Action $model */
                    return Html::a($model->category->title, ['/category/view', 'id_category' => $model->id_category]);
                },
                'format' =>'raw',
                'filter' => ArrayHelper::map(Category::find()->all(), 'id', 'title')
            ],
                        
           
             'created_at:datetime',
             'updated_at:datetime',
                                  
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return \yii\helpers\Html::a('<div class="text-center"><button class="btn btn-info btn-sm">Подробнее</button></div>',
                            (new yii\grid\ActionColumn())->createUrl('product/update', $model, $model->id, 1), [
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
                            (new yii\grid\ActionColumn())->createUrl('product/delete', $model, $model->id, 1), [
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

