<?php

use yii\db\Migration;

class m161215_142557_department extends Migration
{
    public function up()
    {
        
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%department}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull()->comment('название'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%department}}');
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
