<div class="information-blocks">
     <div class="row">
        <?php foreach ($separator as $key=>$value):?>
             <?= $this->render('colomns\item', ['models'=>$separator[$key], 'title'=>$key]);?> 
        <?php endforeach;?>
     </div>
 </div> 