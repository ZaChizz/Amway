<?php

use yii\db\Migration;

class m170613_175958_order extends Migration
{
    public function up()
    {
        
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey()->comment('номер заказа'),
            'phone' => $this->string(255)->comment('телефон'),
            'first_name' => $this->string(255)->comment('имя'),
            'display' => $this->integer('1')->notNull()->comment('статус'),
            'shopping_cart' => $this->text()->notNull()->comment('корзина'),
            'created_at' => $this->integer('11')->notNull()->comment('создано'),
            'updated_at' => $this->integer('11')->notNull()->comment('исправлено'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%order}}');
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
