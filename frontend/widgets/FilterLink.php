<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\widgets;
use Yii;
use frontend\models\Department;

class FilterLink extends \yii\bootstrap\Widget
{
    
    private $models = array();
    private $relation;
    private $c_relation;
    private $title;
    private $id_department;
    private $linkParams;

    public function init(){   
        parent::init();
        
        if(isset(Yii::$app->request->queryParams['ProductSearch']['id_department']))
        {
            $this->models = $this->loadGroup(Yii::$app->request->queryParams['ProductSearch']['id_department']);
            $this->relation = 'category';
            $this->title = $this->models[0]->department->title;
            $this->c_relation = 'group';
        }
            
        else
        {
            $this->models = $this->loadDepartment();
            $this->relation = 'group';
            $this->title = 'Отделы';
            $this->c_relation = 'category';
        }
            

    }

    public function run(){
        
        return $this->render('FilterLink/index', ['model'=>$this->models, 'relation'=>$this->relation, 'c_relation'=>$this->c_relation, 'title'=>$this->title]);
        
    }
    
    private function loadDepartment()
    {
        if(Yii::$app->params['department']['model'])
            $model = Yii::$app->params['department']['model'];
        else
        {
            $model = Department::find()->all();
            Yii::$app->params['department']['model'] = $model;
        }
        
        return $model;
    }
    
    
    private function loadGroup($id)
    {
        $models = $this->loadDepartment();
        foreach($models as $model)
        {
            if($model->id == $id)
                return $model->group;
                
        }
    }
    
}
