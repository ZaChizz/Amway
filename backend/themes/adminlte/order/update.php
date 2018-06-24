<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */

$this->title = 'Заказ №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
?>
<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-object-group"></i>
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body pad table-responsive">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div><!-- /.box -->
</div>
