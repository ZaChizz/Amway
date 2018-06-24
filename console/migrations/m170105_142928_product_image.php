<?php

use yii\db\Migration;

class m170105_142928_product_image extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product_image}}', [
            'id' => $this->primaryKey(),
            'id_product' => $this->integer('11')->notNull(),
            'title' => $this->string(255)->notNull()->comment('название'),
        ], $tableOptions);
        
        $this->addForeignKey('product_image_ibfk_product', 'product_image', 'id_product', 'product', 'id','cascade','cascade');
    }

    public function down()
    {
        $this->dropForeignKey('product_image_ibfk_product', 'product_image');
        
        $this->dropTable('{{%product_image}}');
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
