<?php

use yii\db\Migration;

class m170106_142956_offers_data extends Migration
{
    public function up()
    {
        $this->delete('{{%offers}}');
        $this->delete('{{%offers_product}}');
        
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->insertOffers();
        
        $this->insertOffersProduct();

    }

    public function down()
    {
        $this->delete('{{%offers_product}}');
        $this->delete('{{%offers}}');
    }
    
    protected function insertOffers()
    {
        $this->insert('{{%offers}}', array('id'=>1, 'title'=>'акции'));
        $this->insert('{{%offers}}', array('id'=>2, 'title'=>'новые'));
        $this->insert('{{%offers}}', array('id'=>3, 'title'=>'популярные'));
    }
    
    protected function insertOffersProduct()
    {
        for ($i = 1; $i <= 9; $i++) {
            $this->insert('{{%offers_product}}', array('id'=>$i, 'id_product'=>$i, 'id_offers'=>1));
        }
        
        for ($i = 10; $i <= 19; $i++) {
            $this->insert('{{%offers_product}}', array('id'=>$i, 'id_product'=>$i, 'id_offers'=>2));
        }
        
        for ($i = 20; $i <= 29; $i++) {
            $this->insert('{{%offers_product}}', array('id'=>$i, 'id_product'=>$i, 'id_offers'=>3));
        }
        
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
