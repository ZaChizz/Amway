<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;
?>

<div class="col-md-3">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $model['vendor_code'] ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

           <?=  Html::img('../../img/210/'.$model['img']) ?>
            
          <hr>
            
          <strong><i class="fa fa-book margin-r-5"></i>Название</strong>

          <p class="text-muted">
            <?= $model['title'] ?>
          </p>

          <hr>

          <strong><i class="fa-dollar"></i>Цена</strong>

          <p class="text-muted"><?= $model['price'] ?></p>

          <hr>

          <strong><i class="fa fa-pencil margin-r-5"></i> Бренд</strong>

          <p>
            <span class="label label-info"><?= $model['brand']?></span>
          </p>

          <hr>

          <strong><i class="fa fa-file-text-o margin-r-5"></i>Отдел</strong>

          <p><?= $model['department']?></p>
          
          <hr>
          
          <strong><i class="fa fa-file-text-o margin-r-5"></i>Количество</strong>

          <p>
             <span class="label label-danger"><?= $model['count']?></span>
          </p>
        </div>
        <!-- /.box-body -->
    </div>
</div>
