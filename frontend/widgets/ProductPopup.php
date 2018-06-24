<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 28.04.2016
 * Time: 13:39
 */

namespace frontend\widgets;
use frontend\models\ShoppingCart;


class ProductPopup extends \yii\bootstrap\Widget
{
    
    public $models;
    private $shoppingCart;
    protected $rez;

    public function init(){
        parent::init();
        $this->shoppingCart = new ShoppingCart;
        

    }

    public function run(){
               
        foreach($this->models as $model)
        {
            $this->rez.= $this->render('ProductPopup/index', ['model'=>$model, 'shoppingCart'=>$this->shoppingCart->initialized($model->id)]);
        }

        return $this->rez;

    }

}
?>