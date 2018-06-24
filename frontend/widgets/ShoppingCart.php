<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 28.04.2016
 * Time: 13:39
 */

namespace frontend\widgets;
use Yii;



class ShoppingCart extends \yii\bootstrap\Widget
{

    public function init(){
        parent::init();

    }

    public function run(){
        if(!empty(Yii::$app->params['shoppingCart']))
            return $this->render('ShoppingCart/index',['model'=>Yii::$app->params['shoppingCart'], 'total'=>Yii::$app->params['shoppingCartTotal']]);
        else
            return false;

    }

}
?>