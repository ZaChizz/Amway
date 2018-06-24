<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 11.05.2017
 * Time: 13:39
 */

namespace frontend\widgets;
use Yii;



class ZoomImage extends \yii\bootstrap\Widget
{
    
    public $model;

    public function init(){
        parent::init();

    }

    public function run(){

        return $this->render('ZoomImage/index',['model'=>$this->model]);

    }

}
?>