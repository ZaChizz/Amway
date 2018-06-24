<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 28.04.2016
 * Time: 13:39
 */

namespace frontend\widgets;
use frontend\models\Department;
use frontend\models\SearchForm;

class Search extends \yii\bootstrap\Widget
{
    public $template;
    private $model;
    private $department;

    public function init(){
        if(!$this->template)
            $this->template = 'home';
            
        parent::init();
        $this->department = Department::find()->all();
        $this->model = new SearchForm;

    }

    public function run(){
        
        return $this->render('Search/'.$this->template, ['model'=>$this->model, 'department'=>$this->department]);

    }

}
?>