<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 28.04.2016
 * Time: 13:39
 */

namespace frontend\widgets;
use frontend\models\AdvertiserSearch;



class InformationBlocks extends \yii\bootstrap\Widget
{
    public $type;

    public function init(){
        parent::init();

    }

    public function run(){
        
        return $this->render('InformationBlocks/index', ['model'=>$this->type]);        

    }

}
?>