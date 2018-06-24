<?php
/**
 * Created by NetBeans.
 * User: Ievgen
 * Date: 07.01.2017
 * Time: 22:29
 */

namespace frontend\widgets;


class ProductDescription extends \yii\bootstrap\Widget
{
    public $model;

    public function init(){
        
        
    }

    public function run(){
           
        return $this->render('OfferByProduct/'.$this->type, ['separator'=>$this->separator(), 'products'=>$this->products, 'template'=>$this->template]);

    }
    

}
?>