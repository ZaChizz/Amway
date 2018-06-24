<?php

use yii\db\Migration;

class m170105_142925_price_history extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%price_history}}', [
            'id' => $this->primaryKey(),
            'id_product' => $this->integer('11')->notNull(),
            'price' => $this->integer('11')->notNull()->comment('цена'),
            'created_at' => $this->string(255)->notNull()->comment('единица измерения'),
        ], $tableOptions);

        $this->addForeignKey('price_history_ibfk_product', 'price_history', 'id_product', 'product', 'id','cascade','cascade');

    }

    public function down()
    {
        $this->dropForeignKey('price_history_ibfk_product', 'price_history');
        
        $this->dropTable('price_history');
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
