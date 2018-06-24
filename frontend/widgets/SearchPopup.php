<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 28.04.2016
 * Time: 13:39
 */

namespace frontend\widgets;
use frontend\models\AdvertiserSearch;



class SearchPopup extends \yii\bootstrap\Widget
{
    public $models=0;

    public function init(){
        parent::init();

    }

    public function run(){

        return $this->render('SearchPopup/index', ['model'=>$this->models]);

    }

}
?>