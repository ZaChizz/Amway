<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 28.04.2016
 * Time: 13:39
 */

namespace frontend\widgets;




class Filter extends \yii\bootstrap\Widget
{
    protected $models = array();

    public function init(){
    
        $this->models['color'] = $this->loadModel('frontend\models\Color');
        $this->models['skin'] = $this->loadModel('frontend\models\Skin');
        $this->models['flavor'] = $this->loadModel('frontend\models\Flavor');
        $this->models['size'] = $this->loadModel('frontend\models\Size');
        $this->models['weight'] = $this->loadModel('frontend\models\Weight');
        $this->models['volume'] = $this->loadModel('frontend\models\Volume');
        parent::init();

    }

    public function run(){
        
        $templates = $this->template('skin','Тип кожи',2);
        $templates .= $this->template('flavor','Запах',2);
        $templates .= $this->template('color','Цвет',1);
        $templates .= $this->template('size','Размер',1);
        $templates .= $this->template('weight','Вес',2);
        $templates .= $this->template('volume','Объем',2);
        return $this->render('Filter/index', ['templates'=>$templates]);

    }
    
    protected function template($view,$title, $columns = 1)
    {
        
        if($columns == 2)
        {
            $itemsColumn[0] = '';
            $itemsColumn[1] = '';
            foreach ($this->models[$view] as $key => $value) {
                if($key%2 == 0)/* четные/не четные элементы  */
                    $itemsColumn[0] .= $this->render('Filter/'.$view.'Item', ['model'=>$value]); 
                else
                    $itemsColumn[1] .= $this->render('Filter/'.$view.'Item', ['model'=>$value]);
                
            }
        }
        if($columns == 1) {
            
            $itemsColumn[0] = '';
            
            foreach ($this->models[$view] as $key => $value) {
                $itemsColumn[0] .= $this->render('Filter/'.$view.'Item', ['model'=>$value]);
                
            }
            
        }
        return $this->render('Filter/'.$view, ['itemsColumn'=>$itemsColumn, 'title'=>$title]);
    }
        
    
    protected function loadModel($modelClass)
    {
        
        return $modelClass::find()
            ->orderBy('id')
            ->where(['!=', 'id', 0])    
            ->all();
    }

}

?>