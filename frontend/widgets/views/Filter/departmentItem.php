<div class="accordeon-title"><?= $model->title ?></div>
<div class="accordeon-entry">
    <div class="article-container style-1">
        <ul>
            <?php foreach($model->category as $category):?>
            <li><a href="#"><?= $category->title ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>