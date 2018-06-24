<?php
/**
 * Created by NetBeans.
 * User: Ievgen
 * Date: 07.01.2017
 * Time: 22:29
 */

namespace frontend\widgets;

use frontend\models\OffersProduct;



class OfferByProduct extends \yii\bootstrap\Widget
{
    public $type = 'tabs'; /*Tabs, Colomns*/
    public $template = 'template1'; /* Template1, Template2, Template3 */ 
    protected $models;

    public function init(){
        
        $this->models = OffersProduct::find()
        ->orderBy('id')
        ->all();
        parent::init();
        
    }

    public function run(){
           
        return $this->render('OfferByProduct/'.$this->type, ['separator'=>$this->separator(), 'products'=>$this->products, 'template'=>$this->template]);

    }
    
    protected function separator()
    {
        $separator = array();
        foreach($this->models as $model)
        {
            $separator[$model->offers->title][] = $model;
            
        }
              
        return $separator;

    }
    
    protected function getProducts()
    {
        $models = array();
        foreach($this->models as $model)
        {
            $models[] = $model->product;
            
        }
        
        return $models;
        
    }

}
?>