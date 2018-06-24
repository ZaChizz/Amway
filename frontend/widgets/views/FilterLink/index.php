<div class="information-blocks categories-border-wrapper">
    <div class="block-title size-3"><?= $title ?></div>
    <div class="accordeon">
        <?php foreach($model as $value)
        {
            echo $this->render('item',['model'=>$value, 'relation'=>$relation, 'c_relation'=>$c_relation]);
        }
        ?>
    </div>
</div>