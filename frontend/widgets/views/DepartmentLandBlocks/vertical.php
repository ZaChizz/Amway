 <div class="custom-col-4">
    <div class="row">
        <?php 
            foreach($model as $key=>$value)
            {
                if($key>=4)
                   echo $this->render('item', ['model'=>$value, 'key'=>5]);
            }
        ?>
    </div>
</div>