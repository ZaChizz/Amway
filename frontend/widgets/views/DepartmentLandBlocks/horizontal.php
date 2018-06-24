<div class="row">
    <?php 
        foreach($model as $key=>$value)
        {
            if($key<4)
            {
                if($key<3)
                    echo $this->render('item', ['model'=>$value, 'key'=>1]);
                else 
                    echo $this->render('item', ['model'=>$value, 'key'=>2]);
                
            }
        }
    ?>
</div>
