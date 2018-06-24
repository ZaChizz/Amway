<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace frontend\widgets;
use Yii;
use frontend\models\Department;



class DepartmentCatalogMenu extends \yii\bootstrap\Widget
{
    private $model;
    private $exept_id = 0;
    
    public function init(){
        parent::init();
        if(Yii::$app->params['department']['model'])
            $this->model = Yii::$app->params['department']['model'];
        else
        {
            $this->model = Department::find()->all();
            Yii::$app->params['department']['model'] = $this->model;
        }
         
        if(isset(Yii::$app->request->queryParams['ProductSearch']['id_department']))
            $this->exept_id = Yii::$app->request->queryParams['ProductSearch']['id_department'];

    }

    public function run(){
        if(isset(Yii::$app->request->queryParams['ProductSearch']['id_department']))
            return $this->render('DepartmentCatalogMenu/index', ['model'=>$this->model, 'exept_id'=>$this->exept_id]);
        else
            return false;
        
    }
    
}

