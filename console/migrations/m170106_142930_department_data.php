<?php

use yii\db\Migration;

class m170106_142930_department_data extends Migration
{
    public function up()
    {
            $this->update('{{%department}}', array(
                    'image'=>'product-promo-1.jpg', 
                    'backgroundColor'=>'#26334c',
                    'landHeader'=>'Ароматы',
                    'landTitle'=>'Средства для мужчин HYMM',
                    'label'=>'',
                    'labelClass'=>''),array('id'=>1));
           
            $this->update('{{%department}}', array(
                    'image'=>'product-promo-1.jpg', 
                    'backgroundColor'=>'#d6b620',
                    'landHeader'=>'Уход',
                    'landTitle'=>'Волосы, тело, полость рта',
                    'label'=>'',
                    'labelClass'=>''),array('id'=>2));
            
            $this->update('{{%department}}', array(
                    'image'=>'product-promo-1.jpg', 
                    'backgroundColor'=>'#914168',
                    'landHeader'=>'',
                    'landTitle'=>'Дом',
                    'label'=>'',
                    'labelClass'=>''),array('id'=>3));
            
            $this->update('{{%department}}', array(
                    'image'=>'product-promo-1.jpg', 
                    'backgroundColor'=>'#23c0e0',
                    'landHeader'=>'Посуда',
                    'landTitle'=>'Системы очитски воды',
                    'label'=>'',
                    'labelClass'=>''),array('id'=>4));
            
            $this->update('{{%department}}', array(
                    'image'=>'product-promo-1.jpg', 
                    'backgroundColor'=>'#e35b5b',
                    'landHeader'=>'',
                    'landTitle'=>'Здоровье',
                    'label'=>'',
                    'labelClass'=>''),array('id'=>5));
            
            $this->update('{{%department}}', array(
                    'image'=>'product-promo-1.jpg', 
                    'backgroundColor'=>'#865d3c',
                    'landHeader'=>'',
                    'landTitle'=>'Красота',
                    'label'=>'',
                    'labelClass'=>''),array('id'=>6));
            

    }

    public function down()
    {
        echo "m170303_113400_department_test_records cannot be reverted.\n";

    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
