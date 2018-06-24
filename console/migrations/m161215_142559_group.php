<?php

use yii\db\Migration;

class m161215_142559_group extends Migration
{
    public function up()
    {
         $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%group}}', [
            'id' => $this->primaryKey(),
            'id_department' => $this->integer('11')->notNull(),
            'title' => $this->string(255)->notNull()->comment('название'),
        ], $tableOptions);
        
        $this->addForeignKey('group_ibfk_department', '{{%group}}', 'id_department', '{{%department}}', 'id', 'no action', 'cascade');

    }

    public function down()
    {
        $this->dropForeignKey('group_ibfk_department', 'group');
        
        $this->dropTable('{{%group}}');
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
