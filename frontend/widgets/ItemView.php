<?php
/**
 * Created by NetBeans.
 * User: Ievgen
 * Date: 29.12.2016
 * Time: 16:39
 */

namespace frontend\widgets;


use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;


class ItemView extends \yii\bootstrap\Widget
{
    public $dataProvider;
    public $display=true;
    protected $rez;

    public function init(){
        parent::init();

    }

    public function run(){

        $models = $this->dataProvider->getModels();
        if($this->display)        
            foreach($models as $value)
            {
                $this->rez.= $this->render('ItemView/index', ['model'=>$value]);
            }
        else
            $this->rez=null;
        
        return $this->rez;

    }
}
?>