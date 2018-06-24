<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class m170105_142955_test_records
{
    protected function insertPriceHistory($ids_product)
    {
         $tbl = '{{%price_history}}';
        for ($i = 1; $i <= $ids_product; $i++) {
            $this->insert($tbl, array(
                'id_product'=>$i,
                'price'=>random_int(10,200),
                'created_at'=>time(),
                ));
        }
        return true;
    }
    
        protected function insertProduct_old($num)
    {
        $tbl = '{{%product}}';
        for ($i = 1; $i <= $num; $i++) {
            $this->insert($tbl, array(
                'id'=>$i,
                'id_size'=>$this->getSize(0,3),
                'id_weight'=>$this->getWeight(0,3),
                'id_volume'=> $this->getVolume(0,3),
                'id_category'=>random_int(1,40),
                'id_flavor'=>random_int(0,4),
                'id_skin'=>random_int(0,5),
                'title'=>'product '.$i,
                'vendor_code'=>random_int(111111,999999),
                'description'=>'lorem ip sum set amit zyquit lorem ip sum set amit zyquit lorem ip sum set amit zyquit',
                'short_description'=>'lorem ip sum set amit zyquit',
                'created_at'=>time(),
                'updated_at'=>time()
                ));
        }
        return true;
    }
    
       
    protected function insertDepartment_old()
    {
        $this->insert('{{%department}}', array('title'=>'Ароматы (Франция) и средства для мужчин HYMM', 'id'=>1));
        $this->insert('{{%department}}', array('title'=>'Уход за волосами, телом и полостью рта', 'id'=>2));
        $this->insert('{{%department}}', array('title'=>'Дом', 'id'=>3));
        $this->insert('{{%department}}', array('title'=>'Посуда и система очистки воды', 'id'=>4));
        $this->insert('{{%department}}', array('title'=>'Здоровье', 'id'=>5));
        $this->insert('{{%department}}', array('title'=>'Красота', 'id'=>6));
    }
    
    protected function insertGroup_old()
    {
        $this->insert('{{%group}}', array('title'=>'ароматы', 'id_department'=>1, 'id'=>1));
        $this->insert('{{%group}}', array('title'=>'средства для мужчие HYMM', 'id_department'=>1, 'id'=>2));
        $this->insert('{{%group}}', array('title'=>'пробники', 'id_department'=>1, 'id'=>3));
        
        $this->insert('{{%group}}', array('title'=>'уход за полостью рта', 'id_department'=>2, 'id'=>4));
        $this->insert('{{%group}}', array('title'=>'уход за телом', 'id_department'=>2, 'id'=>5));
        $this->insert('{{%group}}', array('title'=>'уход за волосами', 'id_department'=>2, 'id'=>6));
        $this->insert('{{%group}}', array('title'=>'товары для путешествий', 'id_department'=>2, 'id'=>7));
        
        $this->insert('{{%group}}', array('title'=>'товары для стирки', 'id_department'=>3, 'id'=>8));
        $this->insert('{{%group}}', array('title'=>'товары для уборки', 'id_department'=>3, 'id'=>9));
        $this->insert('{{%group}}', array('title'=>'товары для мытья посуды', 'id_department'=>3, 'id'=>10));
        $this->insert('{{%group}}', array('title'=>'дозаторы и аппликаторы', 'id_department'=>3, 'id'=>11));
        
        $this->insert('{{%group}}', array('title'=>'кухонная посуда', 'id_department'=>4, 'id'=>12));
        $this->insert('{{%group}}', array('title'=>'система очистки воды', 'id_department'=>4, 'id'=>13));
        $this->insert('{{%group}}', array('title'=>'аксессуары', 'id_department'=>4, 'id'=>14));
        
        $this->insert('{{%group}}', array('title'=>'витамины и диетические добавки', 'id_department'=>5, 'id'=>15));
        $this->insert('{{%group}}', array('title'=>'фитнесс и товары для похудения', 'id_department'=>5, 'id'=>16));
        $this->insert('{{%group}}', array('title'=>'продукты питания и напитки', 'id_department'=>5, 'id'=>17));
        $this->insert('{{%group}}', array('title'=>'аксессуары', 'id_department'=>5, 'id'=>18));
        
        $this->insert('{{%group}}', array('title'=>'уход за кожей', 'id_department'=>6, 'id'=>19));
        $this->insert('{{%group}}', array('title'=>'декоративная косметика', 'id_department'=>6, 'id'=>20));
        $this->insert('{{%group}}', array('title'=>'аксессуары', 'id_department'=>6, 'id'=>21));
        $this->insert('{{%group}}', array('title'=>'пакеты, сувенирка', 'id_department'=>6, 'id'=>22));
                     
    }
    
    
    protected function insertCategory_old($num)
    {
        $tbl = '{{%category}}';
        for ($i = 1; $i <= $num; $i++) {
            $this->insert($tbl, array('title'=>'Evening dresses cat 1', 'id_department'=>1, 'id'=>($i-1)*5+1));
            $this->insert($tbl, array('title'=>'Evening dresses cat 2', 'id_department'=>2, 'id'=>($i-1)*5+2));
            $this->insert($tbl, array('title'=>'Evening dresses cat 3', 'id_department'=>3, 'id'=>($i-1)*5+3));
            $this->insert($tbl, array('title'=>'Evening dresses cat 4', 'id_department'=>4, 'id'=>($i-1)*5+4));
            $this->insert($tbl, array('title'=>'Evening dresses cat 5', 'id_department'=>5, 'id'=>($i-1)*5+5));
        }
        return true;
    }
}

