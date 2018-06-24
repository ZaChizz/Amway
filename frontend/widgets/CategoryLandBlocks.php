<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 28.04.2016
 * Time: 13:39
 */

namespace frontend\widgets;
use frontend\models\Group;



class CategoryLandBlocks extends \yii\bootstrap\Widget
{
    public $type;
    private $model;


    public function init(){
        parent::init();
        $this->model = Group::find()->all();

    }

    public function run(){
        
        return $this->render('CategoryLandBlocks/index', ['model'=>$this->model]);        

    }

}
?>