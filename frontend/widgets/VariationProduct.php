<?php
/**
 * Created by NetBeans.
 * User: Ievgen
 * Date: 4.05.2016
 * Time: 21:09
 */

namespace frontend\widgets;
use frontend\models\Product;



class VariationProduct extends \yii\bootstrap\Widget
{
    public $model;
    public $formModel = 0;
    private $variation = 0;

    public function init(){
        parent::init();
        if($this->model->grouping && $this->formModel)
            $this->variation = Product::findAll(['grouping' => $this->model->grouping]);
        
    }

    public function run(){
        if($this->variation)
            return $this->render('VariationProduct/index',['model'=>$this->variation, 'formModel'=>$this->formModel]);        
        else
            return $this->render('VariationProduct/no-variation',['model'=>$this->model, 'formModel'=>$this->formModel]); 
    }

}
?>