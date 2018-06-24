<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model backend\models\category */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Подробнее';
?>

<div class="box box-solid">
    <div class="box-header">
        <i class="fa fa-object-group"></i>
        <h3 class="box-title"><?= Html::encode('Группа') ?></h3>
    </div>
    <div class="box-body pad table-responsive">
        <?php Pjax::begin(); ?>
        <?= $this->render('_form', [
                'model' => $model, 'items'=>$items
        ]) ?>
        <?php Pjax::end(); ?>
    </div><!-- /.box -->
</div>


