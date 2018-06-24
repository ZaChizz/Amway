<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_category',
            'id_group',
            'id_department',
            'skin',
            // 'flavor',
            // 'amount',
            // 'weight',
            // 'volume',
            // 'rgb',
            // 'consist:ntext',
            // 'packaging',
            // 'applications:ntext',
            // 'with_use:ntext',
            // 'necessary:ntext',
            // 'useful:ntext',
            // 'title',
            // 'brand',
            // 'variant_title',
            // 'vendor_code',
            // 'description:ntext',
            // 'short_description',
            // 'tag_search',
            // 'created_at',
            // 'updated_at',
            // 'display',
            // 'grouping',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
