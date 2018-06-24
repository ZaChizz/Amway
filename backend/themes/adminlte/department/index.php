<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use backend\models\Department;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\GroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отдел';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-solid">
    <div class="box-header">
        <i class="fa fa-object-group"></i>
        <h3 class="box-title"><?= $this->title ?></h3>
    </div>
    <div class="box-body pad table-responsive">
        <?php Pjax::begin(); ?>    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pager' => [
                'firstPageLabel' => '<<',
                'lastPageLabel' => '>>',
            ],
            'layout'=>"{summary}\n{pager}\n{items}",
            'columns' => [
                'id',
                'title',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return \yii\helpers\Html::a('<div class="text-center"><button class="btn btn-info btn-sm">Подробнее</button></div>',
                                (new yii\grid\ActionColumn())->createUrl('department/update', $model, $model->id, 1), [
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

