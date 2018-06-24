<?php
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

// with UI
?>
<?= FileUploadUI::widget([
    'model' => $modelImage,
    'attribute' => 'title',
    'url' => ['product/update', 'id' => $model->id],
    'gallery' => false,
    'fieldOptions' => [
        'accept' => 'image/*',
        'class' => 'row'
    ],
    'clientOptions' => [
        'maxFileSize' => 2000000
    ],
    // ...
    'clientEvents' => [
        'fileuploaddone' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
        'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
    ],
]);
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
            [
                'attribute' => 'title',
                'label'=>'картинка',
                  'format' => 'html',    
                  'value' => function ($data) {
                      return Html::img('/img/210/'. $data['title'],
                          ['width' => '70px']);
                  },
            ],
            'id',
            'title',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return \yii\helpers\Html::a('<div class="text-center"><button class="btn btn-danger btn-sm">Удалить</button></div>',
                            (new yii\grid\ActionColumn())->createUrl('product-image/delete', $model, $model->id, 1), [
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



