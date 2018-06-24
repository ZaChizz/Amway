<?php

use yii\db\Migration;

class m161215_160532_category extends Migration
{
    public function up()
    {
         $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'id_group' => $this->integer('11')->notNull(),
            'id_department' => $this->integer('11')->notNull(),
            'title' => $this->string(255)->notNull()->comment('название'),
        ], $tableOptions);
        
        $this->addForeignKey('category_ibfk_group', '{{%category}}', 'id_group', '{{%group}}', 'id', 'no action', 'cascade');
        $this->addForeignKey('category_ibfk_deaprtment', '{{%category}}', 'id_department', '{{%department}}', 'id', 'no action', 'cascade');

    }

    public function down()
    {
        $this->dropForeignKey('category_ibfk_group', 'category');
        $this->dropForeignKey('category_ibfk_department', 'category');
        
        $this->dropTable('{{%category}}');
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
