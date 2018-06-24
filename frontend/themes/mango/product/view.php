<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_category',
            'id_group',
            'id_department',
            'skin',
            'flavor',
            'amount',
            'weight',
            'volume',
            'rgb',
            'consist:ntext',
            'packaging',
            'applications:ntext',
            'with_use:ntext',
            'necessary:ntext',
            'useful:ntext',
            'title',
            'brand',
            'variant_title',
            'vendor_code',
            'description:ntext',
            'short_description',
            'tag_search',
            'created_at',
            'updated_at',
            'display',
            'grouping',
        ],
    ]) ?>

</div>
