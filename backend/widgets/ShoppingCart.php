<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 28.04.2016
 * Time: 13:39
 */

namespace backend\widgets;


class ShoppingCart extends \yii\bootstrap\Widget
{
    public $model;
    private $arr;
    private $rezz;

    public function init(){
        parent::init();
        $this->arr = json_decode($this->model, true);

    }

    public function run(){

        foreach($this->arr as $model)
        {
            $this->rezz .= $this->render('ShoppingCart/item', ['model'=>$model]);
        }
        
        return $this->render('ShoppingCart/index', ['item'=>$this->rezz]);

    }

}
?>