<?php

use yii\db\Migration;

class m170105_142926_offers extends Migration
{
   public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%offers}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull()->comment('название'),

        ], $tableOptions);
        
        $this->createTable('{{%offers_product}}', [
            'id' => $this->primaryKey(),
            'id_product' => $this->integer(11)->notNull()->comment('id product'),
            'id_offers' => $this->integer(11)->notNull()->comment('id offers'),

        ], $tableOptions);
        
        $this->addForeignKey('offers_product_ibfk_product', '{{%offers_product}}', 'id_product', '{{%product}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('offers_product_ibfk_offers', '{{%offers_product}}', 'id_offers', '{{%offers}}', 'id', 'CASCADE', 'CASCADE');
        
    }

    public function down()
    {
        
        $this->dropForeignKey('offers_product_ibfk_product', '{{%offers_product}}');
        $this->dropForeignKey('offers_product_ibfk_offers', '{{%offers_product}}');
        $this->dropTable('{{%offers_product}}');
        $this->dropTable('{{%offers}}');
        
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
