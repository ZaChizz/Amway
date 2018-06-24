<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 28.04.2016
 * Time: 13:39
 */

namespace frontend\widgets;
use Yii;
use frontend\models\Department;



class Departments extends \yii\bootstrap\Widget
{
    public $model=0;

    public function init(){
        parent::init();
        if(Yii::$app->params['department']['model'])
            $this->model = Yii::$app->params['department']['model'];
        else
        {
            $this->model = Department::find()->all();
            Yii::$app->params['department']['model'] = $this->model;
        }
            

    }

    public function run(){

        return $this->render('Departments/index', ['model'=>$this->model]);

    }

}
?>